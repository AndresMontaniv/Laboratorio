<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'username',
        'phone',
        'ci',
        'birthday',
        'laboratory_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions(){
        return $this->hasMany('App\Models\Permission');
    }

    public function binnacles(){
        return $this->hasMany('App\Models\Binnacle');
    }

    public static function getUniqueUsername($name,$labName){    
        $labName = strtoupper($labName);                   
        $palabraLimpia = str_replace(' ', '', $labName);  
        $final= $palabraLimpia."-".str_replace(' ', '', $name); 
        return $final;
    }

    public static function isAdmin(User $user){    
        $permissions = Permission::where('user_id', $user->id)->where('role_id',1)->where('status',1)->get();
        return ( sizeof($permissions) != 0);
    }

    public static function isNurse(User $user){    
        $permissions = Permission::where('user_id', $user->id)->where('role_id',2)->where('status',1)->get();
        return ( sizeof($permissions) != 0);
    }

    public static function isPatient(User $user){    
        $permissions = Permission::where('user_id', $user->id)->where('role_id',3)->where('status',1)->get();
        return ( sizeof($permissions) != 0);
    }
}
