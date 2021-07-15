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
                'name' => 'TELCHI',
                'status' => 1
            ],
            [
                'name' => 'MDM',
                'status' => 1
            ],
            [
                'name' => 'FARMACOR',
                'status' => 1
            ]
        ]);
    }
}
