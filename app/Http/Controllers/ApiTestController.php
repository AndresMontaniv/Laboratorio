<?php

namespace App\Http\Controllers;

use App\Models\Proof;
use App\Models\Test;
use App\Models\TestCampaign;
use Illuminate\Http\Request;

class ApiTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($campaign) //muestra las pruebas de una campania en especifico 
    {
        $testCampaign = TestCampaign::select('proof_id')->where('campaign_id',$campaign)->where('status',1)->get();
        $tests = Proof::whereIn('id', $testCampaign)->get();
            return response()->json([
            'status' => 'ok',
            'data' => $tests
        ], 200);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
