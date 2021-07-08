<?php

namespace Database\Seeders;
use App\Models\Room;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'name' => 'Sala A',
                'laboratory_id' => 1
            ],
            [
                'name' => 'Sala B',
                'laboratory_id' => 1
            ],
            [
                'name' => 'Sala C',
                'laboratory_id' => 1
            ]
        ]);
    }
}
