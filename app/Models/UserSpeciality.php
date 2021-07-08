<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSpeciality extends Model
{
    use HasFactory;

    protected $fillable = [
    'user_id',
    'speciality_id',
    'status'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function speciality(){
        return $this->belongsTo('App\Models\Speciality');
    }
}
