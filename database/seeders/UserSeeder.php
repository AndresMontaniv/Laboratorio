<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                
                'name' => 'Carlos',
                'phone' => '76041031',
                'email' => 'jaldin@gmail.com',
                'password' => Hash::make('123')
            ],
            [
                
                'name' => 'Carla',
                'phone' => '76088031',
                'email' => 'carla.ccc344@gmail.com',
                'password' => Hash::make('123')
            ],
            [
               
                'name' => 'Valeria',
                'phone' => '76647031',
                'email' => 'vale@gmail.com',
                'password' => Hash::make('123')
            ],
            [
                
                'name' => 'Franz',
                'phone' => '77047071',
                'email' => 'franz@gmail.com',
                'password' => Hash::make('123')
            ],
            [
                
                'name' => 'Andres',
                'phone' => '66023031',
                'email' => 'montano@gmail.com',
                'password' => Hash::make('123')
            ],
            [
               
                'name' => 'Sebastian',
                'phone' => '66071031',
                'email' => 'sebas@gmail.com',
                'password' => Hash::make('123')
            ]
        ]);
    }
}
