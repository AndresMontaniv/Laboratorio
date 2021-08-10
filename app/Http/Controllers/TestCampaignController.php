<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\campaign;
use App\Models\Proof;
use App\Models\TestCampaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Prophecy\Doubler\Generator\Node\ReturnTypeNode;

class TestCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $campaign =  campaign::findOrFail($id);
        $using = TestCampaign::select('proof_id')->where('campaign_id', $campaign->id)->get();
        $usedTests = TestCampaign::where('campaign_id',$id)->get();
        $usedTests->load('proof');
        $usedTests->load('campaign');
        $notUsedTests = Proof::where('status',1)->whereNotIn('id',$using)->where('laboratory_id',$campaign->laboratory_id)->get();
        // $notUsedTests = Proof::whereNotIn('id',TestCampaign::select('proof_id')->where('campaign_id',$id)
        // ->get())->where('laboratory_id', Auth::user()->laboratory_id)->get();  //pruebas del lab que no estan en la campania
        return view('testsCampaign.index',compact('usedTests'),compact('notUsedTests'))->with('campaign', $campaign);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($proof, $campaign)
    {
        $usedTests = TestCampaign::create([
            'proof_id' => $proof,
            'campaign_id' => $campaign
        ]);
        $usedTests->load('proof');
        $usedTests->load('campaign');
        Binnacle::setInsert("campaña de ".$usedTests->campaign->title." con prueba ".$usedTests->proof->name,"prueba campaña",Auth::user());
        return redirect()->route('testCampaign.index',$campaign);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TestCampaign  $testCampaign
     * @return \Illuminate\Http\Response
     */

    public function active($testCampaign){
        $cambiar = TestCampaign::findOrFail($testCampaign);
        $cambiar->status = 1;
        $cambiar->update();
        $cambiar->load('proof');
        $cambiar->load('campaign');
        Binnacle::setUpdate("campaña de ".$cambiar->campaign->title." con prueba activada".$cambiar->proof->name,"prueba campaña",Auth::user());
        return redirect()->route('testCampaign.index',$cambiar->campaign_id);
    }

    public function desactive($testCampaign){
        $cambiar = TestCampaign::findOrFail($testCampaign);
        $cambiar->status = 0;
        $cambiar->update();
        $cambiar->load('proof');
        $cambiar->load('campaign');
        Binnacle::setUpdate("campaña de ".$cambiar->campaign->title." con prueba desactivada".$cambiar->proof->name,"prueba campaña",Auth::user());
        return redirect()->route('testCampaign.index',$cambiar->campaign_id);
    }

    public function show(TestCampaign $testCampaign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TestCampaign  $testCampaign
     * @return \Illuminate\Http\Response
     */
    public function edit(TestCampaign $testCampaign)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TestCampaign  $testCampaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestCampaign $testCampaign)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TestCampaign  $testCampaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestCampaign $testCampaign)
    {
        //
    }
}
