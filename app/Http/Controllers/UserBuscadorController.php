<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserBuscadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labs=DB::table('laboratories')->get();
        return view('userBuscador.search',compact('labs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id=User::getIdArray(request('id'));
        $ci=User::getCiArray(request('ci'));
        $username=User::getUsernameArray(request('username'));
        $name=User::getNameArray(request('name'));
        $lastname=User::getLastnameArray(request('lastname'));
        $phone=User::getPhoneArray(request('phone'));
        $email=User::getEmailArray(request('email'));
        $from=request('from');
        $to=request('to');
        $labs=request('labs');
        // dd($request, $id, $ci, $username, $name, $lastname, $phone, $email, $labs);


        $users=DB::table('users')
                ->whereIn('id', $id )
                // ->whereIn('ci', $ci)
                ->whereIn('username', $username)
                ->whereIn('name', $name)
                // ->whereIn('lastname', $lastname)
                ->whereIn('phone', $phone)
                ->whereIn('email', $email)
                ->whereIn('laboratory_id', $labs)
                // ->whereBetween('birthday', [$from, $to])
                ->get();
        
        
        return view('userbuscador.index',compact('users'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
