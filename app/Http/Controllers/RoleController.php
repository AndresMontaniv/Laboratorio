<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
         $roles=Role::all();

       return view('roles.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dato = request()->validate([
            'name' => 'required',
        ]);
        $rol = request()->except('_token');
        Role::insert($rol);
       
        return redirect()->route('roles.index');
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('roles.edit',compact('role'));
    }
    public function update(Request $request, Role $role)
    {
        $dato = request()->validate([
            'name' => 'required',
       
        ]);
        DB::table('roles')->where('id',$role->id)->update( [
                'name'=>$dato['name']
            

         ] );
         return redirect()->route('roles.index');

    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index');

    }
}
