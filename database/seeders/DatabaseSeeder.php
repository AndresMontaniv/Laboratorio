<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lab;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);

        $lab1 = new lab();
        $lab1->nombre = 'Laboratorio 1';
        $lab1->estado= true;
        $lab1->save();

        $lab2 = new lab();
        $lab2->nombre = 'Laboratorio 2';
        $lab2->estado= true;
        $lab2->save();

        $lab3 = new lab();
        $lab3->nombre = 'Laboratorio 3';
        $lab3->estado= false;
        $lab3->save();
    }
}
