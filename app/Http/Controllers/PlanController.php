<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\Plan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans =  Plan::where('status',1)->get();
        return view('plans.index', compact('plans'));
    }

    public function show()
    {
        $plans =  Plan::all();
        return view('plans.show', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function activate($id){
        $plan = Plan::findOrFail($id);
        $plan->status = 1;
        $plan->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($plan->name." activo","planes",$actor);
        return redirect()->route('plans.show');
    }

    public function desactivate($id){
        $plan = Plan::findOrFail($id);
        $plan->status = 0;
        $plan->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($plan->name." desactivo","planes",$actor);
        return redirect()->route('plans.show');
    }

    public function store(Request $request)
    {
        $credentials =   Request()->validate([ //validate all attributes 
            'price' => ['required'],
            'name' => ['required','string'],
            'months' => ['required'],
            'description' => ['required','string'],
        ]);

        // $filename1 = null;
        // if($request->hasFile('image')){
        //     $filename1 = $request->image->getClientOriginalName(). time();
        //     $request->image->storeAs('images', $filename1, 'public');
        // }
        $filename1 = null;
        if($request->hasFile('image')){
            $filename1 = $request->image->getClientOriginalName();
            $destino=public_path('images');
            $request->image->move($destino,$filename1);
        }
        $plan = Plan::create([ //create a new instance of laboratory
            'name' => request('name'),
            'image' => $filename1,
            'price' => request('price'),
            'months' => request('months'),
            'description' => request('description'),
        ]);
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setInsert(request('name'),"planes",$actor);
        return redirect()->route('plans.show');
    }

    public function edit($id)
    {
        $plan = Plan::findOrFail($id);
        return view('plans.edit',compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $credentials =   Request()->validate([ //validate all attributes 
            'price' => ['required'],
            'name' => ['required','string'],
            'months' => ['required'],
            'description' => ['required','string'],
        ]);
        // $filename1 = null;
        // if($request->hasFile('image')){
        //     $filename1 = $request->image->getClientOriginalName(). time();
        //     $request->image->storeAs('images', $filename1, 'public');
        // }
        $filename1 = null;
        if($request->hasFile('image')){
            $filename1 = $request->image->getClientOriginalName();
            $destino=public_path('images');
            $request->image->move($destino,$filename1);
        }
        $plan = Plan::findOrFail($id);
        $plan->price = request('price');
        $plan->name = request('name');
        $plan->months = request('months');
        $plan->description = request('description');
        $plan->image = $filename1;
        $plan->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setUpdate($plan->name,"planes",$actor);
        return redirect()->route('plans.show');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
