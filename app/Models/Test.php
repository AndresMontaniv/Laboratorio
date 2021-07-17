<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'laboratory_id',
        'status',
        'price',
        'name'
    ];

    public function testCampaigns(){
        return $this->hasMany('App\Models\TestCampaign');
    }
}
