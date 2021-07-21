<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class campaign extends Model
{
    use HasFactory;
    protected $fillable = [
        'expiration',
        'initialDate',
        'discount',
        'body',
        'title',
        'laboratory_id'
    ];
    
    protected $dates = ['created_at', 'updated_at','initialDate','expiration'];

    public function testCampaigns(){
        return $this->hasMany('App\Models\TestCampaign');
    }
}
