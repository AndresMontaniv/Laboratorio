<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestCampaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'proof_id',
        'campaign_id',
        'status'
    ];

    public function proof(){
        return $this->belongsTo('App\Models\Proof');
    }

    public function campaign(){
        return $this->belongsTo('App\Models\Campaign');
    }
}
