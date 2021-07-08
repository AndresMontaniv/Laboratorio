<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'imagen',
        'name'
    ];
    public function laboratoyPlan(){
        return $this->hasMany('App\Models\LaboratoryPlan');
    }
    public function users(){
        return $this->hasMany('App\Models\User');
    }
}
