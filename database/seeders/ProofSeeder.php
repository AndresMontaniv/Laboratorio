<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProofSeeder extends Seeder
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
                'name' => 'prueba de sangre',
                'price' => 100.0,
                'detail' => 'Lorem SANGREEEEEE ipsum dolor sit amet consectetur adipisicing elit. Quo modi eos deserunt deleniti ratione fugit voluptate maxime laboriosam aliquid laborum, quia quis odio.',
                'laboratory_id' => 1
            ],
            [
                'name' => 'prueba de orina',
                'price' => 100.0,
                'detail' => 'Lorem MEADOS  ipsum dolor sit amet consectetur adipisicing elit. Quo modi eos deserunt deleniti ratione fugit voluptate maxime laboriosam aliquid laborum, quia quis odio.',
                'laboratory_id' => 1
            ],
            [
                'name' => 'prueba de embarazo',
                'price' => 100.0,
                'detail' => 'Lorem EMBARAZOOOO ipsum dolor sit amet consectetur adipisicing elit. Quo modi eos deserunt deleniti ratione fugit voluptate maxime laboriosam aliquid laborum, quia quis odio.',
                'laboratory_id' => 1
            ],
        ]);
    }
}
