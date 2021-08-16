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
                'status' => 1
            ],
            [
                'name' => 'Farmacorp',
                'status' => 1
            ],
            [
                'name' => 'Analiza',
                'status' => 1
            ],
            [
                'name' => 'Bago',
                'status' => 1
            ],
            [
                'name' => 'Biomedico',
                'status' => 1
            ],
            [
                'name' => 'Biotest',
                'status' => 1
            ],
             [
                'name' => 'Cental',
                'status' => 1
            ]
        ]);
    }
}
