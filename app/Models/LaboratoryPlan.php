<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'imagen',
        'name',
        'status'
    ];
    
    public function laboratory(){
        return $this->BelongsTo('App\Models\Laboratory');
    }

    public function plan(){
        return $this->BelongsTo('App\Models\Plan');
    }
}
