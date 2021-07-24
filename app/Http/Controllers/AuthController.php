<?php
namespace App\Http\Controllers;
use App\Http\Requests\RegisterAuthRequest;
use App\Models\Binnacle;
use App\Models\Laboratory;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller {

    public $loginAfterSignUp = true;

    public function register(Request $request) { //recibe una request  
        $credentials =   Request()->validate([
            'telefono' => ['string'],
            'name' => ['required', 'string'],
            'email' => ['email'],     
            'password' => ['required'],
            'laboratory_id' => ['required']
        ]);
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
            'laboratory_id' => request('laboratory_id'),
            'birthday' => request('fechaNac'),
            'ci' => request('ci'),
            'photo' => $filename
        ]);
        $labotarorio = Laboratory::findOrFail(request('laboratory_id'));
        $user->username = User::getUniqueUsername($user->name,$labotarorio->name,$user->id);
        $user->update();
        Permission::create([
            'role_id' => 3,
            'user_id' => $user->id
        ]);
        Binnacle::setInsert($user->username,"usuarios", $user);
        return response()->json([
        'status' => 'ok',
        'data' => $user
        ], 200);
    }

    public function getLaboratories(){ // muestra los laboratorios disponibles
        $laboratories = Laboratory::where('status',1)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $laboratories
        ], 200);
    }

    public function login(Request $request) {
        $user = User::where('username', request('username'))->first();
        $credentials =   Request()->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string']
         ]);
         if(Auth::attempt($credentials)) {
            //request()->session()->regenerate();
            Binnacle::setLogin($user->username,"usuarios",$user);
            return response()->json([
                'status' => 'ok',
                'data' => $user
            ], 200);
         }
         return response()->json([
            'status' => 'invalid_credentials',
            'message' => 'Nombre de usuario o contraseña no válidos.',
        ], 401);
    }

    public function logout() {
        Auth::logout(); // invalidar el token
        return response()->json([
        'status' => 'ok',
        'message' => 'Cierre de sesión exitoso.'
        ]);
        
    }

    // public function getAuthUser(Request $request) {
    //     $this->validate($request, [
    //     'token' => 'required'
    //     ]);
    //     $user = JWTAuth::authenticate($request->token);
    //     return response()->json(['username' => $user]);
    // }

    // protected function jsonResponse($data, $code = 200){
    //     return response()->json($data, $code,
    //     ['Content-Type' => 'application/json;charset=UTF8', 'Charset' => 'utf-8'], JSON_UNESCAPED_UNICODE);
    // }
}