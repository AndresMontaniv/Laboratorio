<?php

namespace App\Http\Controllers;
use App\Exports\UsersExport;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use App\Models\Bill;
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
     // return $pdf->download('Users.pdf');
     return $pdf->stream('factura.pdf');
   }
}
