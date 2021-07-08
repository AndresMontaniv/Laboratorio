<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class ReservationController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
        
    }
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show( Request $request )
    {
        $dateUsed = ["date" => Carbon::now(), "error" => "No es posible
        realizar una reserva para una fecha pasada a la actual, se mostrara los periodos disponibles para 
        el dia de hoy", "now" => Carbon::now()];
        if(Carbon::parse($request['date']) > Carbon::yesterday()){ // si la fecha seleccionada es correcta no hay error
            $dateUsed['date'] = Carbon::parse($request['date']);
            $dateUsed['error'] = null;
        }
       
        $reserved = Reservation::select('period_id')
        ->where('date',  $dateUsed['date'])
        ->where('status','1')->get();
        $periods = Period::whereNotin('id',$reserved)->get();
        return view('reservas.show', compact('periods'))->with('dateUsed',$dateUsed);
    }

    public function register( $period , $date){
           //$room=Room::select('id')->where('status',2)->get();
            
           $room=Room::where('status',1)->get();
             
            return view('reservas.register', [
            "date"=> $date, "period" => $period ,'room'=>$room]);
     }
    

     public function store(Request $request)
     {
        $request->validate([
            'description' => ['required'],
            'room_id' => ['required'],
        ]);
         $id=$request['room_id'];
         $room=Room::findOrfail($id);
        $room->status=1;
        $room->update();

        Reservation::create([
        
            'date' => $request['date'],
            'description' => $request['description'],
            'period_id' => $request['period_id'],
            'room_id' => $request['room_id'],

        ]);
       
        return redirect()->route('reservations');
     }
     public function update($id){
         $reservation=Reservation::findOrfail($id);
         $reservation->status=1;
         $reservation->update();
         $room=Room::findOrfail($reservation->room_id);
         $room->status=1;
         $room->update();
         return redirect()->route('reservations');
     }

    public function destroy($id)
    {
        $reservation=Reservation::findOrfail($id);
        $reservation->delete();
        return redirect()->route('reservations');
    }
}
