<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\User;
use App\Models\Laboratory;
use App\Models\Analysis;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BillsController extends Controller
{
    
    public function index()
    {
        $factura=Bill::where('laboratory_id',Auth::user()->laboratory_id)->get();
        //User::join('bills','bills.user_id','=','users_id')->where('users.laboratory_id','=',Auth::user()->laboratory_id)->get();
        return view('bills.index',compact('factura'));
    }

   
    public function create()

    {
        $analyses=Analysis::where('lab_id',Auth::user()->laboratory_id)->get();
       $id=Auth::user()->laboratory_id;
        $pacientes=User::join('permissions','permissions.user_id','=','users.id')->where('users.laboratory_id','=',$id)->where('permissions.role_id','=',3)->get();
        return view('bills.create',compact('pacientes','analyses'));
    }

    
    public function store(Request $request)
    {
 
        $user_id=request('user_id');
        $analyses_id=request('analysis_id');

        $bill=Bill::create([
             'user_id'=>request('user_id'),
             'nit'=> request('nit'),
             'laboratory_id'=>Auth::user()->laboratory_id,
             'analysis_id'=>request('analyses_id')
        ]);
 
       /* $monto=0;
         $analyse=DB::table('analyses_bill')->where('bill_id',$bill->id)->get();
          foreach($analyse as $analyses){
              $price=DB::table('analyses')->where('id',$analyses->analyses_id)->value('price');
             $monto+=$price;
          }*/
       //  $bill->importe=$monto;
        // $bill->update();
        $monto=Analysis::where('id',$bill->analysis_id)->value('total');
        $bill->importe=$monto;
        $bill->update();
        return redirect()->route('bills.index');
    }


    public function show($id)
    {
        $bill=Bill::findOrfail($id);
        return view('bills.show',compact('bill'));
    }

    
    public function edit($id)
    {
       $bills=Bill::findOrfail($id);
      
       return view('bills.edit',compact('bills'));
    }

   
    public function update(Request $request, $id)
    {
       $bill=Bill::findOrfail($id);
        $bill->nit=request('nit');

       /* if ($request->analyses){
            $bill->Analyses()->sync($request->analyses);
        }
        $monto=0;
         $analyse=DB::table('analyses_bill')->where('bill_id',$bill->id)->get();
          foreach($analyse as $analyses){
              $price=DB::table('analyses')->where('id',$analyses->analyses_id)->value('price');
             $monto+=$price;
          }*/
         $bill->update();
        return redirect()->route('bills.index');
    }

   
    public function destroy($id)
    {
        $bills=Bill::findOrfail($id);
        $bills->status= 0;
        $bills->update();
        return redirect()->route('bills.index');
    }
}
