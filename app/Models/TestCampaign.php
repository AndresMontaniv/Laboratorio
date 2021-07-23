<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'test_id',
        'campaign_id',
    ];

    public function test(){
        return $this->belongsTo('App\Models\Test');
    }

    public function campaign(){
        return $this->belongsTo('App\Models\Campaign');
    }
}
