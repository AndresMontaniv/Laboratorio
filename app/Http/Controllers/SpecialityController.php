<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\Speciality;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialities = Speciality::orderby('id','DESC')->where('laboratory_id', Auth::user()->laboratory_id)->paginate(4);
        return view('specialities.index', compact('specialities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $credentials =   Request()->validate([
            'name' => ['required','string']
            
        ]);
        Speciality::create([
            'name' => request('name'),
            'laboratory_id' => Auth::user()->laboratory_id
        ]);
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setInsert(request('name'),"especialidades",$actor);
        return redirect()->route('speciality.all');
    }

    public function activate($id){
        $speciality = Speciality::findOrFail($id);
        $speciality->status = 1;
        $speciality->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate("activo ".$speciality->name,"especialidades",$actor);
        return redirect()->route('speciality.all');
    }

    public function desactivate($id){
        $speciality = Speciality::findOrFail($id);
        $speciality->status = 0;
        $speciality->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate("desactivo ".$speciality->name,"especialidades", $actor);
        return redirect()->route('speciality.all');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function show(Speciality $speciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function edit(Speciality $speciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials =   Request()->validate([
            'name' => ['required','string']
        ]);
        $speciality = Speciality::findOrFail($id);
        $speciality->name = Request('name');
        $speciality->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($speciality->name,"especialidades", $actor);
        return redirect()->route('speciality.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Speciality  $speciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Speciality $speciality)
    {
        //
    }
}
