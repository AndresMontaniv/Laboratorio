<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestCampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('test_campaigns')->insert([
            [
                'campaign_id' => 1,
                'proof_id' => 1
            ],
            [
                'campaign_id' => 1,
                'proof_id' => 3
            ],
            [
                'campaign_id' => 1,
                'proof_id' => 2
            ],
            [
                'campaign_id' => 2,
                'proof_id' => 1
            ],
            [
                'campaign_id' => 2,
                'proof_id' => 3
            ],
            [
                'campaign_id' => 3,
                'proof_id' => 2
            ],
        ]);
    }
}
