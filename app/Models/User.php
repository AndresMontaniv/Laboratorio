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
        'laboratory_id',
        'photo'
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

    // public function getJWTIdentifier() {
    //     return $this->getKey();
    // }
    // public function getJWTCustomClaims() {
    //     return [];
    // }

    public function notification (){
        return $this->hasOne('App\Models\Notification');
    }
    
    public function analyses(){
        return $this->hasMany('App\Models\Analysis');
    }
    
    public function permissions(){
        return $this->hasMany('App\Models\Permission');
    }

    public function user_specialities(){
        return $this->hasMany('App\Models\Speciality');
    }

    public function binnacles(){
        return $this->hasMany('App\Models\Binnacle');
    }

    public function laboratory(){
        return $this->belongsTo('App\Models\Laboratory');
    }

    public static function getUniqueUsername($name,$labName, $id){    
        $labName = strtoupper($labName);                   
        $palabraLimpia = str_replace(' ', '', $labName);  
        $final= $palabraLimpia."-".str_replace(' ', '', $name).$id; 
        return $final;
    }

    public static function getIdArray($id){
        $array=array();
        $users=User::all();
        if ($id!=null){
            array_push($array,$id);
        }else{
            foreach($users as $user){
                if($user->id!=null){
                    array_push($array,$user->id);
                }
            }
        }
        return $array;
    }

    public static function getUsernameArray($username){
        $array=array();
        $users=User::all();
        if ($username!=null){
            array_push($array,$username);
        }else{
            foreach($users as $user){
                if($user->username!=null){
                    array_push($array,$user->username);
                }
            }
        }
        return $array;
    }

    public static function getNameArray($name){
        $array=array();
        $users=User::all();
        if ($name!=null){
            array_push($array,$name);
        }else{
            foreach($users as $user){
                if($user->name!=null){
                    array_push($array,$user->name);
                }
            }
        }
        return $array;
    }

    public static function getLastnameArray($lastname){
        $array=array();
        $users=User::all();
        if ($lastname!=null){
            array_push($array,$lastname);
        }else{
            foreach($users as $user){
                if($user->lastname!=null){
                    array_push($array,$user->lastname);
                }
            }
        }
        return $array;
    }

    public static function getPhoneArray($phone){
        $array=array();
        $users=User::all();
        if ($phone!=null){
            array_push($array,$phone);
        }else{
            foreach($users as $user){
                if($user->phone!=null){
                    array_push($array,$user->phone);
                }
            }
        }
        return $array;
    }

    public static function getCiArray($ci){
        $array=array();
        $users=User::all();
        if ($ci!=null){
            array_push($array,$ci);
        }else{
            foreach($users as $user){
                if($user->ci!=null){
                    array_push($array,$user->ci);
                }
            }
        }
        return $array;
    }

    

    public static function getEmailArray($email){
        $array=array();
        $users=User::all();
        if ($email!=null){
            array_push($array,$email);
        }else{
            foreach($users as $user){
                if($user->email!=null){
                    array_push($array,$user->email);
                }
            }
        }
        return $array;
    }

    public static function getLabArray($labs){
        $array=array();
        $users=User::all();
        if ($labs!=null){
            return $labs;
        }else{
            foreach($users as $user){
                if($user->laboratory_id!=null){
                    array_push($array,$user->laboratory_id);
                }
            }
        }
        return $array;
    }
    

    public static function isSuperAdmin(User $user){    
        $permissions = Permission::where('user_id', $user->id)->where('role_id',4)->where('status',1)->get();
        return ( sizeof($permissions) != 0);
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
    
    public function reservations()
    {
        return  $this->hasMany('App\Models\Reservation');
    }
}
