<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
Use App\Models\User;
use App\Models\Laboratory;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function index()
    {
        //'user_id'=> Auth::user()->id

        $id=Auth::user()->laboratory_id;
        $users=DB::table('users')->where('laboratory_id',$id)->where('status','=',1)->get();
        return view('users.index',compact('users'));
      
    }

   
    public function create()
    {
        $roles=DB::table('roles')->where('id','!=',3)->where('id','!=',4)->get();
       return view('users.create',compact('roles'));
    }

    
    public function store(Request $request)
    {
    
        $name=request('name');
        $phone=request('phone');
        $ci=request('ci');
        $birthday=request('birthday');
        $email=request('email');
        $password=request('password');
        $roles=request('roles');
        $id=Auth::user()->laboratory_id;
        $user=User::create([
            'name'=> request('name'),
            'phone'=> request('phone'),
            'ci'=> request('ci'), 
            'birthday'=> request('birthday'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password')),
        ]);
        $user->laboratory_id=$id;
        $laboratorio=Laboratory::findOrfail($user->laboratory_id);
        $user->username=User::getUniqueUsername($user->name,$laboratorio->name);
        $user->update();
        $permiso=new Permission();
        $permiso->user_id=$user->id;
        $permiso->role_id= $request->roles;
        $permiso->save();
        return redirect()->route('users.index');

    }

    
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show',compact('user'));
    }

    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
       $roles=DB::table('roles')->where('id','!=',3)->where('id','!=',4)->get();
        return view('users.edit',compact('user','roles')) ;       

    }

  
    public function update(Request $request, $id)
    {
       
        $name=request('name');
        $phone=request('phone');
        $email=request('email');
        $password=request('password');
        $roles=request('roles');
          DB::table('users')->where('id', $id)->update([
            'name'=> request('name'),
            'phone'=> request('phone'),
            'email'=> request('email'),
            'password'=> bcrypt(request('password'))
          ]);
          $user=User::findOrfail($id);
        $laboratorio=Laboratory::findOrfail($user->laboratory_id);
        $user->username=User::getUniqueUsername($user->name,$laboratorio->name);
        $user->update();

        DB::table('permissions')->where('user_id', $user->id)->update(['role_id'=>$request->roles]); 
        return redirect()->route('users.index');

    }

   
    public function destroy($id)
    {
       $user=User::findOrfail($id);
      /* $user->laboratory_id=null;
       $user->update();
       $permiso = DB::table('permissions')->where('user_id', $user->id)->update(['user_id'=>null,'role_id'=>null]);
       Permission::destroy($permiso->id);*/
        $user->status=0; //inavilitado
        $user->update();
       return redirect()->route('users.index');
    }
}
