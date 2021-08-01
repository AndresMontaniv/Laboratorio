<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Analysis;

class AnalysisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $analysis1= new Analysis();
        $analysis1->lab_id=1;
        $analysis1->detail=0;
        $analysis1->doc='doc1';
        $analysis1->price='100';
        $analysis1->total='100';
        $analysis1->patient_id=7;
        $analysis1->nurse_id=6;
        $analysis1->proof_id=1;
        $analysis1->detail='Detail1';
        $analysis1->save();


        $analysis2= new Analysis();
        $analysis2->lab_id=1;
        $analysis2->detail=0;
        $analysis2->doc='doc2';
        $analysis2->price='100';
        $analysis2->total='100';
        $analysis2->patient_id=8;
        $analysis2->nurse_id=6;
        $analysis2->proof_id=2;
        $analysis2->detail='Detail2';
        $analysis2->save();


    }
}
