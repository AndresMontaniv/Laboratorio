<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialities')->insert([
            [
                'name' => 'Alergología',
                'laboratory_id' => 1
            ],
            [
                'name' => 'Anestesiología',
                'laboratory_id' => 1
            ],
            [
                'name' => 'Angiología',
                'laboratory_id' => 1
            ],
            [
                'name' => 'Cardiología',
                'laboratory_id' => 1
            ],
            [
                'name' => 'Endocrinología',
                'laboratory_id' => 1
            ]
        ]);
    }
}
