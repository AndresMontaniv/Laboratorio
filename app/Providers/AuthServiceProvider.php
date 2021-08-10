<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        
        $this->registerPolicies();
        Gate::define('nurseAdmin', function($user){         
            $permissions = DB::table('permissions')->where('user_id',$user->id)->whereIn('role_id',[1,2])->where('status',1)->get();
            return ( sizeof($permissions) != 0);
        });

        Gate::define('admin', function($user){         
            $permissions = DB::table('permissions')->where('user_id',$user->id)->where('role_id',1)->where('status',1)->get();
            return ( sizeof($permissions) != 0);
        });

        Gate::define('nurse', function($user){         
            $permissions = DB::table('permissions')->where('user_id',$user->id)->where('role_id',2)->where('status',1)->get();
           // dd($permissions);
            return ( sizeof($permissions) != 0);
        });

        Gate::define('patient', function($user){      
            $permissions = DB::table('permissions')->where('user_id',$user->id)->where('role_id',3)->where('status',1)->get();
            // si es que la longitud de la consulta permission 0 != 0 -> false 1 != 0  ->true
            return ( sizeof($permissions) != 0);
        });

        Gate::define('superAdmin', function($user){      
            $permissions = DB::table('permissions')->where('user_id',$user->id)->where('role_id',4)->where('status',1)->get();
            // si es que la longitud de la consulta permission 0 != 0 -> false 1 != 0  ->true
            return ( sizeof($permissions) != 0);
        });
    }
}
