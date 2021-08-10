<?php

namespace App\Http\Controllers;

use App\Models\Instrument;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class InstrumentsController extends Controller
{
    
    public function index()
    {
        $instruments=Instrument::where('laboratory_id',Auth::user()->laboratory_id)->where('status',1)->get();
        return view('instruments.index',compact('instruments'));
    }

   
    public function create()
    {
        return view('instruments.create');
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);
        Instrument::create([
            'name'=>request('name'),
            'laboratory_id'=>Auth::user()->laboratory_id
        ]);
        return redirect()->route('instruments.index');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $instruments=Instrument::findOrfail($id);
        return view('instruments.edit',compact('instruments'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
        ]);
        $instruments=Instrument::findOrfail($id);
        $instruments->name=$request->get('name');
        $instruments->update();
        return redirect()->route('instruments.index');
    }

  
    public function destroy($id)
    {
        $instruments=Instrument::findOrfail($id);
        $instruments->status= 0;
        $instruments->update();
        return redirect()->route('instruments.index');  
      }

     
}
