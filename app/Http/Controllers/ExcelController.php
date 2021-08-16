<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Bill;
use App\Models\User;
use App\Models\Laboratory;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;


class ExcelController extends Controller
{
   public function exportExcel(){
    return Excel::download(new UsersExport, 'UsersExcel.xlsx'); 
   }

   public function PdfUser(){
       
    $id=Auth::user()->laboratory_id;
    $users=DB::table('users')->where('laboratory_id',$id)->get();
        $pdf=PDF::loadview('users.pdf',compact('users'));
        return $pdf->download('Users.pdf');
   }

   public function Pdfactura($id){
      $bill=Bill::findOrfail($id);
      $pdf=PDF::loadview('bills.pdf',compact('bill'));
     return $pdf->stream('factura.pdf');
   }



   public function grafica(){
     $paciente=DB::table('permissions')->where('role_id',3)->get();  
     $administrador=DB::table('permissions')->where('role_id',1)->get();  
     $medicos=DB::table('permissions')->where('role_id',2)->get(); 

      $user=User::all();
      $laboratorio=Laboratory::all();
      $laboratory=array();
      $use_lab=array();
      $usepac_lab=array();
      $useadmin_lab=array();
      $usemed_lab=array();
      $userpaciente=array();
      $useradmin=array();
      $usermedico=array();
      foreach($laboratorio as $lab){//nombre de los laboratorios
         array_push($laboratory,$lab->name);
         
      }

      foreach( $paciente as $pac ){// id de todo los pacientes registrados
            array_push($userpaciente,$pac->user_id);
         
     }
     foreach( $administrador as $admin ){// id de todo los administrador registrados
      array_push($useradmin,$admin->user_id);
   
     }
     foreach( $medicos as $medico ){// id de todo los medicos registrados
      array_push($usermedico,$medico->user_id);
   
     }
     
      foreach($user as $use){   // id de laboratorio  al que pertenece laboratorio al 
          
              if ($use->laboratory_id !=NULL) {

               array_push($use_lab,$use->laboratory_id);  

               if (in_array($use->id,$useradmin)) {
                  array_push($useadmin_lab,$use->laboratory_id);
               }else{
                     if (in_array($use->id,$usermedico)) {
                        array_push($usemed_lab,$use->laboratory_id);
                     }else{
                        array_push($usepac_lab,$use->laboratory_id);   
                     }
               }
           
        }
             
      }
      sort($usepac_lab); //usuarios pacientes en cada laboratorio
      sort($useadmin_lab);//usuarios administrador  en cada laboratorio
      sort($usemed_lab);//usuarios medico en cada laboratorio
      sort($use_lab);  //usuario total 
     $newarray=array_count_values($usepac_lab);
     $newarray2=array_count_values($use_lab);
     $administra=array_count_values($useadmin_lab);
     $medico=array_count_values($usemed_lab);

     return view('grafica',compact('newarray','laboratory','newarray2'),compact('administra','medico'));
   }

   public function graficausuario(){
      $usuario=User::select(DB::raw("COUNT(*) as count"))->where('laboratory_id',Auth::user()->laboratory_id)
      ->whereYear('created_at',date('Y'))
      ->groupBy(DB::raw("Second(created_at)"))->pluck('count');
      return view('users.grafica',compact('usuario'));
   }

   public function graficaReserva(){
      $users = User::select('id')->where('laboratory_id', Auth::user()->laboratory_id)->get();
      $reserva=Reservation::select(DB::raw("COUNT(*) as count"))->whereIn('id',$users)
      ->whereYear('created_at',date('Y'))->groupBy(DB::raw("Second(created_at)"))->pluck('count');
      return view('reservas.grafica',compact('reserva'));
   }
}