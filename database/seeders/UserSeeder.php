<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Random;
use PhpParser\Node\Stmt\Foreach_;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        $user=User::factory(60)->create();
      /*  foreach($user as $use){
            $use->permissions()->attach([
                rand(1,3)
            ]);
        }*/
    }
}