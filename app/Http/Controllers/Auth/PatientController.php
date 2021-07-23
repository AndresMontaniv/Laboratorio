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
        // dd(request()->ip());
        $user = User::where('username', request('username'))->first();
        
        $credentials =   Request()->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
         ]);
        if((User::isAdmin($user) || User::isNurse($user) || User::isSuperAdmin($user))){
             return back()->withErrors('Usted no tiene los permisos para acceder a este login, para acceder necesita tener el rol PACIENTE');
        }  
        $remember = request()->filled('remember');
         if(Auth::attempt($credentials, $remember)){
            request()->session()->regenerate();
            Binnacle::setLogin($user->username,"usuarios",$user);
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

    public function create(Request $request){
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
        //dd($request->image);
        $filename = null;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');
        }
        $user = User::create([
            'phone' => request('telefono'),
            'name' => request('name'),
            'email' => request('email'),   
            'password' => Hash::make(request('password')),
            'laboratory_id' => request('labId'),
            'birthday' => request('fechaNac'),
            'ci' => request('ci'),
            'photo' => $filename
        ]);
        $labotarorio = Laboratory::findOrFail(request('labId'));
        $user->username = User::getUniqueUsername($user->name,$labotarorio->name,$user->id);
        $user->update();
        Permission::create([
            'role_id' => 3,
            'user_id' => $user->id
        ]);
        Binnacle::setInsert($user->username,"usuarios", $user);
        
        //should redirect to a view which shows all the inserted data and USERNAME to login

        return redirect()->route('patients.credentials', $user->id);
    }

    public function showCredentials($id){
        $user = User::where('id',$id)->first();
        $user->load('laboratory');
        return view('patients.credentials', compact('user'));
    }

}
