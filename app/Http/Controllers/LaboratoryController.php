<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\Laboratory;
use App\Models\LaboratoryPlan;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratories = Laboratory::all();
        return view('laboratories.index', compact('laboratories'));
    }

    public function active($id)
    {
        $laboratory = Laboratory::findOrFail($id);
        $laboratory->status = 1;
        $laboratory->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($laboratory->name,"laboratorios",$actor);
        return redirect()->route('laboratories.index');
    }

    public function desactive($id)
    {
        $laboratory = Laboratory::findOrFail($id);
        $laboratory->status = 0;
        $laboratory->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($laboratory->name,"laboratorios",$actor);
        return redirect()->route('laboratories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($plan_id)
    {
        $plan = Plan::findOrFail($plan_id);
        return view('laboratories.create', compact('plan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    

    public function store(Request $request)
    {
        
        $credentials =   Request()->validate([ //validate all attributes 
            'nameL' => ['required','string'],
            'name' => ['required','string'],
            'phone' => ['string'],
            'ci' => ['required','string'],
            'birthday' => ['date'],
            'password' => ['required','string','min:3', 'confirmed'],
        ]);
        // $filename1 = null;
        // if($request->hasFile('labImg')){
        //     $filename1 = $request->labImg->getClientOriginalName(). time();
        //     $request->labImg->storeAs('images', $filename1, 'public');
        // }

        $filename1 = null;
        if($request->hasFile('labImg')){
            $filename1 = $request->labImg->getClientOriginalName();
            $destino=public_path('images');
            $request->labImg->move($destino,$filename1);
        }

        $lab = Laboratory::create([ //create a new instance of laboratory
            'name' => request('nameL'),
            'imagen' => $filename1
        ]);

        $plan = Plan::findOrFail(request('plan_id'));
        $finaldate = Carbon::now('America/Caracas');
        $finaldate->addMonths($plan->months); // calculate the expiration date
        LaboratoryPlan::create([
            'expirationDate' => $finaldate,
            'initialDate' => Carbon::now('America/Caracas')->today(),
            'plan_id' => $plan->id,
            'laboratory_id' => $lab->id
        ]);
        
        // $filename = null;
        // if($request->hasFile('image')){
        //     $filename = $request->image->getClientOriginalName();
        //     $request->image->storeAs('images', $filename, 'public');
        // }
        
        $filename = null;
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $destino=public_path('images');
            $request->image->move($destino,$filename);
        }

        $user = User::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'ci' => request('ci'),
            'birthday' => request('birthday'),
            'email' => request('email'),
            'laboratory_id' => $lab->id,
            'password' => Hash::make(request('password')),
            'photo' => $filename
        ]);
        $user->username = User::getUniqueUsername(request('name'),request('nameL'),$user->id);
        $user->update();
        DB::table('permissions')->insert([
            [
                'user_id' => $user->id,
                'role_id' => 1  // add ADMIN role to laboratory's owner
            ],
        ]);
        // despues de crear el usuario administrador y laboratorio no se donde deberia redireccionarlo
        //quizas a la HOME PAGE debido a que su laboratorio no lo habriamos activado y por lo tanto deberia tener status = 0  lab pendiente
        Binnacle::setInsert($user->username,"usuarios", $user);
        return redirect()->route('patients.credentials', $user->id);
        //return redirect()->route('user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratory $laboratory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        //
    }
}
