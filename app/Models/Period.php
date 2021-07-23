<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Period extends Model
{
    use HasFactory;
   // public $guarded =['id','created_at','updated_at'];
   protected $dates = ['created_at', 'updated_at','begin','end'];
   protected $fillable = [
    'begin',
    'end',
    'status',
    'laboratory_id'
];
   
    public function reservations()
    {
        //relacion periodo y reserva
        return  $this->hasMany('App\Models\Reservation');
    }

    public static function available(Period $period, $date){
        $usedRooms = Reservation::select('room_id')->where('period_id',$period->id)->where('date', $date)->where('status',1)->get();
        $rooms = Room::where('laboratory_id', Auth::user()->laboratory_id)->whereNotIn('id',$usedRooms)->get();
        return sizeof($rooms)!= 0;
    }
}
