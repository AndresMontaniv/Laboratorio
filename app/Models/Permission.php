<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $fillable = [
        'role_id',
        'user_id',
        'status'
    ];
    public function user(){
        return $this->BelongsTo('App\Models\User');
    }

    public function role(){
        return $this->BelongsTo('App\Models\Role');
    }
}
