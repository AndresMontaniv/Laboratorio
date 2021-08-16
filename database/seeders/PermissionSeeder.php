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
        DB::table('permissions')->insert([
            [
                'user_id' => 1,
                'role_id' => 4
            ],
            [
                'user_id' => 2,
                'role_id' => 1
            ],
            [
                'user_id' => 3,
                'role_id' => 1
            ]
        ]);
        Permission::factory(60)->create();
    }
}
