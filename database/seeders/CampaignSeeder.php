<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('campaigns')->insert([
            [
                'discount' => 0.5,
                'expiration' => Carbon::create(2021,8,1,12,12,12),
                'initialDate'=> Carbon::create(2021,7,1,12,12,12),
                'body'=> 'Lorem ipsum cum harum labore quam, debitis tempore aut ut ipsa ad provident asperiores. Dolorum.',
                'title' => 'Descuento para pacientes vacunados',
                'laboratory_id' => 1
            ],
            [
                'discount' => 0.5,
                'expiration' => Carbon::create(2021,10,1,12,12,12),
                'initialDate'=> Carbon::create(2021,6,1,12,12,12),
                'body'=> 'Lorem ipsum cum harum labore quam, debitis tempore aut ut ipsa ad provident asperiores. Dolorum.',
                'title' => 'Descuento para hinchas del boquita papa',
                'laboratory_id' => 1
            ],
            [
                'discount' => 0.5,
                'expiration' => Carbon::create(2021,5,1,12,12,12),
                'initialDate'=> Carbon::create(2021,4,1,12,12,12),
                'body'=> 'Lorem ipsum cum harum labore quam, debitis tempore aut ut ipsa ad provident asperiores. Dolorum.',
                'title' => 'Descuento pa embarazadas',
                'laboratory_id' => 1
            ]
        ]);
    }
}
