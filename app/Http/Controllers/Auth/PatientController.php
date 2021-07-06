<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Binnacle;
use App\Models\Laboratory;
use App\Models\Permission;
use Carbon\Carbon;
class PatientController extends Controller
{
    public function login()
    {
        
        $user = User::where('username', request('username'))->first();
        
        $credentials =   Request()->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
         ]);
        $remember = request()->filled('remember');
         if(Auth::attempt($credentials, $remember)){
            request()->session()->regenerate();
            // Binnacle::create([
            //     'entity' => Request('user'),
            //     'action' => "Se loggeo en",
            //     'table' => "El sistema",
            //     'user_id'=> Auth::user()->id
            // ]); 
            return redirect()->route('patients.index', $user->id);
            // view('patients.index',compact('user'));
         }
         throw ValidationException::withMessages([
            'username' => __('auth.failed')
         ]);
    }

    public function index($id){
        $user = User::findOrFail($id);
        return view('patients.index',compact('user'));
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/');
    }

    public function create(){
        //dd(request());
        // $name = User::where('username',request('username'))->get();
        // //dd($name);
        // if(sizeof($name)!=0 ){
        //     return back()->withErrors('Este nombre de usuario ya existe');
        // }
        $credentials =   Request()->validate([
            'telefono' => ['string'],
            'name' => ['required', 'string'],
            'email' => ['email'],     
            'password' => ['required', 'string', 'confirmed'],
            'labId' => ['required']
        ]);
        $user = User::create([
            'phone' => request('telefono'),
            'name' => request('name'),
            'email' => request('email'),   
            'password' => Hash::make(request('password')),
            'laboratory_id' => request('labId'),
            'birthday' => request('fechaNac'),
            'ci' => request('ci')
        ]);
        $labotarorio = Laboratory::findOrFail(request('labId'));
        $user->username = User::getUniqueUsername($user->name,$labotarorio->name, $user->id);
        $user->update();
        // Binnacle::create([
        //     'entity' => Request('user'),
        //     'action' => "inserto",
        //     'table' => "Usuarios",
        //     'user_id'=> Auth::user()->id
        // ]);
        Permission::created([
            'role_id' => 3,
            'user_id' => $user->id
        ]);
        return redirect()->route('patient.login');
    }

}
