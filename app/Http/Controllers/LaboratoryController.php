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
        //
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

        $lab = Laboratory::create([ //create a new instance of laboratory
            'name' => request('nameL')
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
        $user = User::create([
            'name' => request('name'),
            'phone' => request('phone'),
            'ci' => request('ci'),
            'birthday' => request('birthday'),
            'email' => request('email'),
            'laboratory_id' => $lab->id,
            'password' => Hash::make(request('password')),
        ]);
        $user->username = User::getUniqueUsername(request('name'),request('nameL'), $user->id);
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
        return redirect()->route('login');
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
