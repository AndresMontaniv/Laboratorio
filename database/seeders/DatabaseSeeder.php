<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlanSeeder::class);
        $this->call(LaboratorySeeder::class);
        $this->call(LaboratoryPlanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(SpecialitySeeder::class);
        //esto es para los 3 usuarios del seeder que no se porque no se les asigna el laboratory_id
        $user1 = User::findOrFail(2);
        $user1->laboratory_id = 1;
        $user1->update();
        $user2 = User::findOrFail(3);
        $user2->laboratory_id = 1;
        $user2->update();
        $user3 = User::findOrFail(4);
        $user3->laboratory_id = 1;
        $user3->update();
    }
}
