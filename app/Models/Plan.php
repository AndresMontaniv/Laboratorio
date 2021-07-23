<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'name',
        'description',
        'months',
        'image',
        'status'
    ];
    
    public function laboratoyPlan(){
        return $this->hasMany('App\Models\LaboratoryPlan');
    }
}
