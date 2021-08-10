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
                'name' => 'Prueba de antígeno.',
                'detail'=>'Prueba de antígeno:Esta prueba para la COVID-19 detecta ciertas proteínas en el virus. Se usa un hisopo largo para tomar una muestra del fluido de la nariz, y las pruebas de antígeno pueden dar resultados en minutos. Se pueden enviar otras muestras a un laboratorio para su análisis. ',
                 'image'=>'imagen1',
                'laboratory_id' => 1,
                'price' => 150.5,
            ],
            [
                'name' => 'Panel básico metabólico',
                'detail'=>'Panel básico metabólico: a través de esta prueba se puede evaluar los niveles de glucosa, electrolitos (sodio, potasio, dióxido de carbono y cloro). La diabetes es una enfermedad frecuente debido al alto nivel de glucosa en la sangre, puede desencadenar una serie de trastornos fatales en el cuerpo, como son enfermedades en los riñones y corazón.',
                'image'=>'imagen2',
                'laboratory_id' => 1,
                'price' => 95.5,
            ],
            [
                'name' => 'Prueba de covid',
                'detail'=>'Prueba de la RCP: También conocida como la prueba molecular, detecta el material genético del virus que causa la COVID-19 usando una técnica de laboratorio llamada reacción en cadena de la polimerasa (RCP).',
                'image'=>'imagen3',
                'laboratory_id' => 1,
                'price' => 105.5,
            ],
            [
                'name' => 'Hemograma',
                'detail'=>'Hemograma: su finalidad es realizar un conteo de los elementos de la sangre, como las células blancas rojas y plaquetas. Estos valores tienen una gran importancia en el desarrollo del sistema inmunológico de la salud. En los pacientes con Dengue es muy característico ver la disminución de los glóbulos blancos (leucopenia) y las plaquetas (trombopenia).',
                'image'=>'imagen4',
                'laboratory_id' => 1,
                'price' => 85.5,
            ],
            [
                'name' => 'Urinalisis',
                'detail'=>'Urinalisis: este análisis se realiza a través de unos cuantos mililitros de desecho humano (orina), es un análisis clave para detectar problemas con el sistema urinario como una infección, diabetes, mal funcionamiento de los riñones, ',
                'image'=>'imagen5',
                'laboratory_id' => 1,
                'price' => 45.5,
            ],
            [
                'name' => 'Heces por parásitos',
                'detail'=>'Heces por parásitos: por medio de esta prueba se pueden detectar parásitos en las heces, especialmente en los niños. Un examen sencillo, mediante el cual se puede determinar las causas de la diarrea en el caso de ser por parásitos o sangre oculta en las heces.',
                'image'=>'imagen6',
                'laboratory_id' => 1,
                'price' => 60.5,
            ],
            [
                'name' => 'Perfil lipídico',
                'detail'=>'Perfil lipídico: un alto factor de riesgo de enfermedades cardiovasculares y arteriosclerosis es el colesterol elevado. La importancia de este análisis radica en evaluar los factores de riesgo coronario.',
                'image'=>'imagen8',
                'laboratory_id' => 1,
                'price' => 50.5,
            ],
        ]);
    }
}
