<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plans')->insert([
            [
                'name' => 'Basico',
                'price' => 100.0,
                'description' => 'Este plan consiste en un plan basico por un mes',
                'months' => 1
            ],
            [
                'name' => 'Ejecutivo',
                'price' => 999.0,
                'description' => 'Este plan consiste en un plan para empresas medianas/grandes, es el servicio completo por un anio entero',
                'months' => 12
            ],
            [
                'name' => 'Vitalicio',
                'price' => 1999.0,
                'description' => 'Este plan consiste en un plan para laboratorios consolidados, apertura nuestro servicio para todo el recorrido de su empresa',
                'months' => 10000
            ],
        ]);
    }
}
