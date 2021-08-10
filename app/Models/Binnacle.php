<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binnacle extends Model
{
    use HasFactory;
    protected $fillable = [
        'action',
        'entity',
        'table',
        'user_id',
        'laboratory_id',
        'ip'
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function user(){
        return $this->BelongsTo('App\Models\User');
    }

    public static function setInsert($entity, $table,User $user = null){
        Binnacle::create([
            'action' => 'Inserto',
            'entity' => $entity,
            'table' => $table,
            'ip' => Binnacle::getIp(),
            'user_id' => $user->id,
            'laboratory_id' => $user->laboratory_id   
        ]);
    }

    public static function setUpdate($entity, $table,User $user){
        Binnacle::create([
            'action' => 'Actualizo',
            'entity' => $entity,
            'table' => $table,
            'ip' => Binnacle::getIp(),
            'user_id' => $user->id,
            'laboratory_id' => $user->laboratory_id   
        ]);
    }

    public static function setDelete($entity, $table,User $user){
        Binnacle::create([
            'action' => 'Borro',
            'entity' => $entity,
            'table' => $table,
            'ip' => Binnacle::getIp(),
            'user_id' => $user->id,
            'laboratory_id' => $user->laboratory_id   
        ]);
    }

    public static function setLogin($entity, $table,User $user){
        Binnacle::create([
            'action' => 'Logged',
            'entity' => $entity,
            'table' => $table,
            'ip' => Binnacle::getIp(),
            'user_id' => $user->id,
            'laboratory_id' => $user->laboratory_id
        ]);
    }

    private static function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
    
}
