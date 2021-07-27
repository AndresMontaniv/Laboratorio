<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Analysis extends Model
{
    use HasFactory;
    protected $table="analyses";
    protected $guarded=['id','created_at','updated_at'];
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
        'discount',
        'detail',
        'doc',
        'status',
        'price',
        'total',
        'patient_id',
        'lab_id',
        'nurse_id'
    ];

    public function nurse(){
        return $this->belongsTo('App\Models\User');
    }

    public function patient(){
        return $this->belongsTo('App\Models\User');
    }

    public function proof(){
        return $this->belongsTo('App\Models\Proof');
    }

    public function bill(){
        return $this->belongsTo('App\Models\Bill');
    }

}
