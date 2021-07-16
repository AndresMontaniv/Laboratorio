<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('periods')->insert([
            [
                'begin' => '07:00:00',
                'end' =>'08:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '08:00:00',
                'end' =>'09:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '09:00:00',
                'end' =>'10:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '10:00:00',
                'end' =>'11:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '11:00:00',
                'end' =>'12:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '12:00:00',
                'end' =>'13:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '13:00:00',
                'end' =>'14:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '15:00:00',
                'end' =>'16:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '00:00:00',
                'end' =>'01:00:00',
                'laboratory_id' => 1
            ],
            [
                'begin' => '01:00:00',
                'end' =>'02:00:00',
                'laboratory_id' => 1
            ],
        ]);
    }
}
