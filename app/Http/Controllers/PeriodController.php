<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use Illuminate\Support\Facades\DB;
use App\Models\Period;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periodo=Period::all();
        return view('periods.index',compact('periodo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('periods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inicio=request('inicio');
        $fin=request('fin');

        $periodo = Period::create([
            'inicio'=> request('inicio'),
            'fin'=> request('fin'), 
            
        ]);
        Binnacle::setInsert($periodo->inicio." - ".$periodo->fin,"periodos", Auth::user());
        return redirect()->route('periods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $periodo=Period::findOrfail($id);
        return view('periods.edit',compact('periodo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dato=request()->validate([
            'inicio'=>['required'],
            'fin'=>['required'],
            ]);
        DB::table('periods')->where('id',$id)->update([
            'inicio'=>$dato['inicio'],
            'fin'=>$dato['fin'],
           
            ]);
            return redirect()->route('periods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Period::destroy($id);
        return redirect()->route('periods.index');    }
}
