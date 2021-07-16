<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\User;
use App\Models\UserSpeciality;
use Illuminate\Http\Request;

class UserSpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);
        $using = UserSpeciality::select('speciality_id')->where('user_id',$user->id)->get();
        $User_Specialities = UserSpeciality::where('user_id',$id)->get();
        $User_Specialities->load('speciality');
        $User_Specialities->load('user');
        $specialities = Speciality::where('status',1)->whereNotIn('id', $using)->get();
        
        return view('users.specialities', compact('specialities'),compact('User_Specialities'))->with('usuario',$user);
    }

    public function setSpeciality($id,$speciality){
        $r = UserSpeciality::create([
            'user_id' => $id,
            'speciality_id' => $speciality
        ]);     
        $r->load('user');
        return redirect()->route('userSpeciality.index', $id);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id,$speciality)
    {
        $r = UserSpeciality::create([
            'user_id' => $id,
            'speciality_id' => $speciality
        ]);     
        $r->load('user');
        return redirect()->route('userSpeciality.index', $id);
    }

    public function activateSpeciality($id){
        $user_Speciality = UserSpeciality::findOrFail($id);
        $user_Speciality->load('user');
        $user_Speciality->status = 1;
        $user_Speciality->update();
    
        return redirect()->route('userSpeciality.index', $user_Speciality->user->id);
    }

    public function desactivateSpeciality($id){
        $user_Speciality = UserSpeciality::findOrFail($id);
        $user_Speciality->load('user');
        $user_Speciality->status = 0;
        $user_Speciality->update();

        return redirect()->route('userSpeciality.index', $user_Speciality->user->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserSpeciality  $userSpeciality
     * @return \Illuminate\Http\Response
     */
    public function show(UserSpeciality $userSpeciality)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserSpeciality  $userSpeciality
     * @return \Illuminate\Http\Response
     */
    public function edit(UserSpeciality $userSpeciality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserSpeciality  $userSpeciality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserSpeciality $userSpeciality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserSpeciality  $userSpeciality
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserSpeciality $userSpeciality)
    {
        //
    }
}
