<?php

namespace App\Models;
use App\Models\Instrument;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'detail',
        'price',
        'image',
        'laboratory_id',
        'status',
    ];
    protected $guarded=['id','created_at','updated_at'];
    use HasFactory;

    public function testCampaigns(){
        return  $this->hasMany('App\Models\TestCampaign');
    }    

    public function Instrument(){
        return $this->belongsToMany(Instrument::class);
    }
    public function analyses(){
        return $this->hasMany('App\Models\Analysis');
    }
}
