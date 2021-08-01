<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $guarded =['id','created_at','updated_at'];
    protected $dates = ['created_at', 'updated_at', 'date'];

    public function notification (){
        return $this->hasOne('App\Models\Notification');
    }
    public function user()
    {
        return  $this->belongsTo('App\Models\User');
    }
    public function period()
    {
        return  $this->belongsTo('App\Models\Period');
    }
    public function room(){
        return $this->belongsTo('App\Models\Room');
    }
}
