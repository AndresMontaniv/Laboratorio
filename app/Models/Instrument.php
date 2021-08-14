<?php

namespace App\Models;
use App\Models\Proof;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    use HasFactory;
    
    protected $guarded=['id','created_at','updated_at'];

    public function Proof(){
        return $this->belongsToMany(Proof::class);
    }

}
