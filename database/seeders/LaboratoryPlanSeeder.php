<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class LaboratoryPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laboratory_plans')->insert([
            [
                'expirationDate' => Carbon::now('America/Caracas'),
                'initialDate' => Carbon::now('America/Caracas')->addMonths(1),
                'plan_id' => '2',
                'laboratory_id' => '1',
            ]
        ]);
    }
}
