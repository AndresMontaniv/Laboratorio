<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id')->where('laboratory_id', Auth::user()->laboratory_id)->get();
        $reserva= Reservation::whereIn('id',$users)->get();
        return view('reservas.index',compact('reserva'));
    }


    public function menu(){
        return view('reservations.index');
    }

    public function searched(Request $request){
        $today = Carbon::now('America/Caracas')->today();
        $usedPeriods = Reservation::select('period_id')->where('date',$request['date'])->where('status',1)->get();
        $availablePeriods = Period::whereNotIn('id',$usedPeriods)->get();
        // $availableReservation = Reservation::select('room_id')->whereIn('id',$availablePeriods)->get();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reservas.create');
    
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
