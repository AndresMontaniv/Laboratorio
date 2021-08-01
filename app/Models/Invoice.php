<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table= "bills";
    protected $guarded=['id','created_at','updated_at'];
    protected $dates = ['created_at', 'updated_at'];
}
