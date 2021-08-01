<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'detail',
        'analysis_id',
        'reservation_id'
    ];
    protected $dates = ['created_at', 'updated_at','date'];
    public function analysis (){
        return $this->belongsTo('App\Models\Analysis');
    }

    public function reservation(){
        return $this->BelongsTo('App\Models\Reservation');
    }
}
