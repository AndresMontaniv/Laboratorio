<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'laboratory_id',
        'expirationDate',
        'initialDate',
        'plan_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'expirationDate',
        'initialDate'
    ];

    public function laboratory(){
        return $this->BelongsTo('App\Models\Laboratory');
    }

    public function plan(){
        return $this->BelongsTo('App\Models\Plan');
    }
}
