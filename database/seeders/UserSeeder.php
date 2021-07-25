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
                'name' => 'Carlos Isaac',
                'lastname' => 'Jaldin Benavides',
                'username' => 'CarlosJaldin',
                'phone' => '76041031',
                'email' => 'carjal192000@gmail.com',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Monti',
                'username' => 'TELCHI-Monti1',
                'phone' => '76041031',
                'email' => 'jaldin@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id' => 1,
            ],
            [
                'name' => 'pedro',
                'username' => 'TELCHI-pedro1',
                'phone' => '7511131',
                'email' => 'pedro@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id' => 1,
            ],
            [
                'name' => 'maria',
                'username' => 'TELCHI-maria1',
                'phone' => '76411131',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id' => 1,
            ],
            [
                'name' => 'sebastiansito',
                'username' => 'TELCHI-sebastiansito5',
                'phone' => '764121231',
                'email' => 'sebas@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id' => 1,
            ],
            [
                'name' => 'Enfermero',
                'username' => 'TELCHI-enfermero',
                'phone' => '76411131',
                'email' => 'enfermero@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id' => 1,
            ],
            [
                'name' => 'Paciente1',
                'username' => 'TELCHI-Paciente15',
                'phone' => '764121231',
                'email' => 'paciente1@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id' => 1,
            ],
            [
                'name' => 'Paciente2',
                'username' => 'TELCHI-Paciente25',
                'phone' => '764222232',
                'email' => 'paciente2@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id' => 1,
            ]
           
        ]);
    }
}
