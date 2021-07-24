<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Analysis;
use App\Models\Invoice;
use App\Models\Proof;
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
        $this->call(SpecialitySeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(ProofSeeder::class);
        // $this->call(TestSeeder::class);
        //esto es para los 3 usuarios del seeder que no se porque no se les asigna el laboratory_id
        $user1 = User::findOrFail(2);
        $user1->laboratory_id = 1;
        $user1->update();
        $user2 = User::findOrFail(3);
        $user2->laboratory_id = 1;
        $user2->update();
        $user3 = User::findOrFail(4);
        $user3->laboratory_id = 1;
        $user3->update();
        
        // $invoice1= new Invoice();
        // $invoice1->discount=0.25;
        // $invoice1->nit="123456789";
        // $invoice1->netPrice=100;
        // $invoice1->grossPrice=125;
        // $invoice1->user_id=1;
        // $invoice1->save();

        $invoice2= new Invoice();
        $invoice2->discount=0.15;
        $invoice2->nit="987654321";
        $invoice2->netPrice=200;
        $invoice2->grossPrice=225;
        $invoice2->user_id=1;
        $invoice2->save();

        $testCampaign1= new TestCampaign();
        $testCampaign1->campaign_id=1;
        $testCampaign1->test_id=1;
        $testCampaign1->save();

        $testCampaign2= new TestCampaign();
        $testCampaign2->campaign_id=2;
        $testCampaign2->test_id=2;
        $testCampaign2->save();

        

    }
}
