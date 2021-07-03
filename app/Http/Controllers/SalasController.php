<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Salas;
use Illuminate\Http\Request;

class SalasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sala=Salas::all();
        return view('salas.index',compact('sala'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('salas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombre=request('nombre');
        $estado=request('estado');

        $sala=Salas::create([
            'nombre'=> request('nombre'),
            'estado'=> request('estado'), 
            
        ]);
        return redirect()->route('salas.index');
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
        $sala=Salas::findOrfail($id);
        return view('salas.edit',compact('sala'));
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
            'nombre'=>['required'],
            'estado'=>['required'],
            ]);
        DB::table('salas')->where('id',$id)->update([
            'nombre'=>$dato['nombre'],
            'estado'=>$dato['estado'],
           
            ]);
            return redirect()->route('salas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Salas::destroy($id);
        return redirect()->route('salas.index');
    }
}
