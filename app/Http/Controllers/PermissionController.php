<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function activate($id){
        $permission = Permission::findOrFail($id);
        $permission->load('user');
        $permission->load('role');
        $permission->status = 1;
        $permission->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($permission->role->name." activo-> ".$permission->user->name,"permisos",$actor);
        return redirect()->route('permissions.index', $permission->user->id);
    }

    public function desactivate($id){
        $permission = Permission::findOrFail($id);
        $permission->load('user');
        $permission->status = 0;
        $permission->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($permission->role->name." desactivo-> ".$permission->user->name,"permisos",$actor);
        return redirect()->route('permissions.index', $permission->user->id);
    }

    public function index($id)
    {
        $user = User::findOrFail($id);
        $using = Permission::select('role_id')->where('user_id',$user->id)->get();
        $permissions = Permission::where('user_id',$id)->get();
        $permissions->load('role');
        $permissions->load('user');
        $roles = Role::where('id','!=',4)->whereNotIn('id', $using)->get();
        return view('users.roles', compact('roles'),compact('permissions'))->with('usuario',$user);
    }

    public function setPermission($id,$role){
        $permission = Permission::create([
            'user_id' => $id,
            'role_id' => $role
        ]);     
        $permission->load('user');
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setInsert($permission->role->name." -> ".$permission->user->name,"permisos",$actor);
        return redirect()->route('permissions.index', $id);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
