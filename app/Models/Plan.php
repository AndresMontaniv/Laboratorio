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
        'description'
    ];
    
    public function laboratoyPlan(){
        return $this->hasMany('App\Models\LaboratoryPlan');
    }

    // public static function getPrice(Plan $plan){
    //     return $plan->price." holaa";
    // }
}
