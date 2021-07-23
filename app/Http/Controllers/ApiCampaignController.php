<?php

namespace App\Http\Controllers;

use App\Models\campaign;
use App\Models\User;
use Illuminate\Http\Request;

class ApiCampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index($id) //muestra las campanias disponibles del laboratorio de un usuario
    {
        $user = User::findOrFail($id);
        $campaigns =  campaign::where('status',1)->where('laboratory_id',$user->laboratory_id)->get();
        return response()->json([
            'status' => 'ok',
            'data' => $campaigns
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
        Request()->validate([
            'title' => ['required'],
            'body' => ['required'],
            'expiration' => ['required'],
            'initialDate' => ['required'],
        ]);
        $input = $request->all();
        campaign::create($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro creado correctamente'
        ], 200);
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
        $campaign = Campaign::findOrFail($id);
        $input = $request->all();
        $campaign->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente'
        ], 200);
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
