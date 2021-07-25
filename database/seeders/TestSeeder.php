<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proofs')->insert([
            [
                'name' => 'Prueba de sangre',
                'laboratory_id' => 1,
                'price' => 95.5,
            ],
            [
                'name' => 'Prueba de glucosa',
                'laboratory_id' => 1,
                'price' => 45.5,
            ],
            [
                'name' => 'Prueba de covid',
                'laboratory_id' => 1,
                'price' => 35.5,
            ],
            [
                'name' => 'Prueba de orina',
                'laboratory_id' => 1,
                'price' => 25.5,
            ]
        ]);
    }
}
