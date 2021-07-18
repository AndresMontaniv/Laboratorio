<?php

namespace App\Http\Controllers;

use App\Models\Binnacle;
use App\Models\Period;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id) //reservaciones activas de un usuario
    {
        $reservations = Reservation::where('user_id',$id)->where('status',1)->get();
        $reservations->load('user');
        $reservations->load('period');
        $reservations->load('room');
        return response()->json([
            'status' => 'ok',
            'data' => $reservations
        ], 200);
    }

    public function searched(Request $request, $laboratory){ //mostrar los periodos disponibles y las datas usadas
        $today = Carbon::now('America/Caracas')->today();
        if(Carbon::parse($request['date']) < $today){
            $today = Carbon::parse($request['date']);
        }
        $dateUsed = ["date" => $request['date'], "error" => "No es posible
        realizar una reserva para una fecha pasada a la actual, se mostrara los periodos disponibles para 
        el dia de hoy", "now" => Carbon::now()];
        $periods = Period::where('status',1)->where('laboratory_id', $laboratory)->orderby('begin','asc')->get();
        if($today == Carbon::parse($request['date'])){
            $periods = Period::where('begin','>', Carbon::now('America/Caracas'))->where('laboratory_id', $laboratory)->where('status',1)->orderby('begin','DESC')->get();
        }
        return response()->json([
            'status' => 'ok',
            'data' => $periods,
            'dateUsed' => $dateUsed
        ], 200);
    }

    public function store($period,$date,$user){ //crear nueva reservation
        $usuario = User::findOrFail($user);
        $usedRooms = Reservation::select('room_id')->where('period_id',$period)->where('date', $date)->where('status',1)->get();
        $room = Room::where('laboratory_id', $usuario->laboratory_id)->whereNotIn('id',$usedRooms)->first();
        $res = Reservation::create([
            'date' => $date,
            'user_id' => $usuario->id,
            'period_id' => $period,
            'room_id' => $room->id
        ]);  
        $res->load('user');
        $actor = User::findOrFail($usuario->id);
        Binnacle::setInsert("reserva en ".$res->date." de ".$res->user->name,"reservaciones",$actor);
        return response()->json([
            'status' => 'ok',
            'data' => $res
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
