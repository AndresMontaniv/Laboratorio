<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\Proof;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class ProofsController extends Controller
{
    public function index()
    {
        $proofs=DB::table('proofs')->where('status','=',1)->where('laboratory_id',Auth::user()->laboratory_id)->get();

        return view('proofs.index',compact('proofs'));
    }

    
    public function create()
    {
      return view('proofs.create');
    }

    
    public function store(Request $request)

    {

        $request->validate([
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'price'=>'required',
            'name'=>'required',
            'detail'=>'required',

        ]);

           if ($request->hasFile('image')) {
              $imgname=$request->image->getClientOriginalName();
              $destino=public_path('images');
              $request->image->move($destino,$imgname);
           }else{
               $imgname=NULL;
           }
        $prueba =  Proof::create([
            'price'=>request('price'),
            'name'=>request('name'),
            'image'=>$imgname,
            'detail'=>request('detail'),
            'laboratory_id'=>Auth::user()->laboratory_id
        ]);
        Binnacle::setInsert($prueba->detail,"prueba",Auth::user());
        return redirect()->route('proofs.index');
    }

   
    public function show($id)
    {
    }

    public function showall()
    {
        $proofs=DB::table('proofs')->where('status','=',1)->where('laboratory_id',Auth::user()->laboratory_id)->get();

        return view('proofs.showall',compact('proofs'));
    }

   
    public function edit($id)
    {
        $proofs=Proof::findOrfail($id);
         return view('proofs.edit',compact('proofs'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'image'=>'image|mimes:jpg,jpeg,png,gif,svg|max:2048',
            'price'=>'required',
            'name'=>'required',
            'detail'=>'required',
        ]);

           if ($request->hasFile('image')) {
              $imgname=$request->image->getClientOriginalName();
              $destino=public_path('images');
              $request->image->move($destino,$imgname);
           }else{
               $imgname=NULL;
           }
         $proofs=Proof::findOrfail($id);
         $proofs->price= $request->get('price');
         $proofs->name= $request->get('name');
         $proofs->detail= $request->get('detail');
         $proofs->image= $imgname;
         $proofs->update();
         Binnacle::setUpdate($proofs->detail,"prueba",Auth::user());
        return redirect()->route('proofs.index');
     
    }

    
    public function destroy($id)
    {
        $proofs=Proof::findOrfail($id);
        $proofs->status= 0;
        $proofs->update();
        Binnacle::setDelete($proofs->detail,"prueba",Auth::user());
        return redirect()->route('proofs.index');
    }


}
