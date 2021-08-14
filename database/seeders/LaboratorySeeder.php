<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LaboratorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laboratories')->insert([
            [
                'name' => 'Telchi',
                'status' => 1,
                'imagen' => 'logotelchi.png'
            ],
            [
                'name' => 'Farmacorp',
                'status' => 1,
                'imagen' => 'Farmacorp.png'
            ],
            [
                'name' => 'Analiza',
                'status' => 1,
                'imagen' => 'Analiza.png'
            ],
            [
                'name' => 'Bago',
                'status' => 1,
                'imagen' => 'Bago.png'
            ],
            [
                'name' => 'Biomedico',
                'status' => 1,
                'imagen' => 'Biomedico.png'
            ],
            [
                'name' => 'Biotest',
                'status' => 1,
                'imagen' => 'Biotest.png'
            ],
             [
                'name' => 'Cental',
                'status' => 1,
                'imagen' => 'Cental.png'
            ]
        ]);
    }
}
