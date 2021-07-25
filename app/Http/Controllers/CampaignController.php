<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\campaign;
use App\Models\User;
use App\Models\Proof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($laboratory)
    {
        //
        $campaigns = campaign::where("status",1)->where("laboratory_id",$laboratory)->get();
        return view('campaign.index', compact('campaigns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function all(){
        $campaigns = campaign::where("laboratory_id",Auth::user()->laboratory_id)->get();
        return view('campaign.all', compact('campaigns'));
    }

    public function active($id){
        $campaign = campaign::findOrFail($id);
        $campaign->status = 1;
        $campaign->update();
        return redirect()->route('campaign.all');
    }
    public function desactive($id){
        $campaign = campaign::findOrFail($id);
        $campaign->status = 0;
        $campaign->update();
        return redirect()->route('campaign.all');
    }
    public function store(Request $request)
    {
        $credentials =   Request()->validate([
            'expiration' => ['required'],
            'initialDate' => ['required'],
            'body' => ['required'],
            'title' => ['required'],
            'laboratory_id' => ['required'],
        ]);
        
        $campaign=campaign::create([
            'expiration' => request('expiration'),
            'initialDate' => request('initialDate'),
            'body' => request('body'),
            'title' => request('title'),
            'laboratory_id' => request('laboratory_id'),
            'discount' => request('discount'),
        ]);
        $code="CAMPDC".$campaign->id;
        $campaign->discountCode=$code;
        $campaign->update();
        $actor = User::findOrFail(Auth::user()->id);
        Binnacle::setInsert(request('title'),"campaña",$actor);
        return redirect()->route('campaign.all');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show(campaign $campaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = campaign::findOrFail($id);
        return view('campaign.edit', compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $credentials =   Request()->validate([
            'expiration' => ['required'],
            'initialDate' => ['required'],
            'body' => ['required'],
            'title' => ['required']
        ]);
        $campaign = campaign::findOrFail($id);
        $campaign->title = request('title');
        $campaign->body = request('body');
        $campaign->initialDate = request('initialDate');
        $campaign->expiration = request('expiration');
        $campaign->discount = request('discount');
        $campaign->update();
        return redirect()->route('campaign.all');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(campaign $campaign)
    {
        //
    }
}
