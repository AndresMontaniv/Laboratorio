<?php

namespace App\Http\Controllers;

Use \Carbon\Carbon;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\Period;

class ReservationController extends Controller
{
    public function __construct()
    {
        Carbon::setLocale('es');
        
    }
    public function index()
    {
        
            $reservations= Reservation::all();
           /* $reservations->load('user');
            dd($reservations);*/
             return view('reservas.index',compact('reservations'));
         
     
    }


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
        ->where('active','1')->get();
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
        $room->status=2;
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
         $reservation->active=2;
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
