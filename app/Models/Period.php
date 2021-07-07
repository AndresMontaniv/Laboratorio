<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;
   // public $guarded =['id','created_at','updated_at'];
   protected $dates = ['created_at', 'updated_at','inicio','fin'];

    public function reservations()
    {
        //relacion periodo y reserva
        return  $this->hasMany('App\Models\Reservation');
        

    }
}
