<?php

namespace Database\Seeders;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::factory(60)->create();

        $permi= new Permission();
        $permi->user_id=1;
        $permi->role_id=1;
        $permi->save();

    }
}
