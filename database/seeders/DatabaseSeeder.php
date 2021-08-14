<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Analysis;
use App\Models\Invoice;
use App\Models\Proof;
use App\Models\Bill;
use App\Models\Field;
use App\Models\TestCampaign;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlanSeeder::class);
        
        $this->call(LaboratorySeeder::class);
        $this->call(LaboratoryPlanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(PeriodSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(SpecialitySeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(ProofSeeder::class);
        $this->call(TestCampaignSeeder::class);
        $this->call(AnalysisSeeder::class);
        // $this->call(TestSeeder::class);
        //esto es para los 3 usuarios del seeder que no se porque no se les asigna el laboratory_id
       /* $user1 = User::findOrFail(2);
        $user1->laboratory_id = 1;
        $user1->update();
        $user2 = User::findOrFail(3);
        $user2->laboratory_id = 1;
        $user2->update();
        $user3 = User::findOrFail(4);
        $user3->laboratory_id = 1;
        $user3->update();
        
        $user6 = User::findOrFail(6);
        $user6->laboratory_id = 1;
        $user6->update();
        
        $user7 = User::findOrFail(7);
        $user7->laboratory_id = 1;
        $user7->update();

        $user8 = User::findOrFail(8);
        $user8->laboratory_id = 1;
        $user8->update();*/
        
        // $invoice1= new Invoice();
        // $invoice1->discount=0.25;
        // $invoice1->nit="123456789";
        // $invoice1->netPrice=100;
        // $invoice1->grossPrice=125;
        // $invoice1->user_id=1;
        // $invoice1->save();

        

        // $testCampaign1= new TestCampaign();
        // $testCampaign1->campaign_id=1;
        // $testCampaign1->proof_id=1;
        // $testCampaign1->save();

        // $testCampaign2= new TestCampaign();
        // $testCampaign2->campaign_id=2;
        // $testCampaign2->proof_id=2;
        // $testCampaign2->save();

        // $bill1= new Bill();
        // $bill1->nit='123456789';
        // $bill1->importe='100';
        // $bill1->user_id=7;
        // $bill1->laboratory_id=1;
        // $bill1->analysis_id=1;
        // $bill1->save();


        $field1= new Field();
        $field1->name='field1';
        $field1->femaleMinParam=2;
        $field1->femaleMaxParam=7;
        $field1->maleMinParam=3;
        $field1->maleMaxParam=9;
        $field1->laboratory_id=1;
        $field1->save();

        $field2= new Field();
        $field2->name='field2';
        $field2->femaleMinParam=1;
        $field2->femaleMaxParam=5;
        $field2->maleMinParam=4;
        $field2->maleMaxParam=10;
        $field2->laboratory_id=1;
        $field2->save();

        

    }
}
