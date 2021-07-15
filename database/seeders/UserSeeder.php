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
                'name' => 'Monti',
                'username' => 'TELCHI-Monti1',
                'phone' => '76041031',
                'email' => 'jaldin@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id'=> 1
            ],
            [
                'name' => 'Carla',
                'username' => 'MDM-Carla',
                'phone' => '76056031',
                'email' => 'carla.ccc344@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id'=> 2
            ],
            [
                'name' => 'David',
                'username' => 'FARMACOR-David',
                'phone' => '74940481',
                'email' => 'david@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id'=> 3
            ]
           
        ]);
    }
}
