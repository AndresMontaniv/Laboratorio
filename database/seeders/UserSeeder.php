<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
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
        
        DB::table('users')->insert([
            [
                'name' => 'Carlos Isaac',
                'username' => 'CarlosJaldin',
                'phone' => '76041031',
                'email' => 'jaldin@gmail.com',
                'ci' => '6250025',
                'password' => Hash::make('123'),
            ],
            [
                'name' => 'Monti',
                'username' => 'TELCHI-Monti1',
                'phone' => '76041031',
                'email' => 'monti@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id'=> 1
            ],
            [
                'name' => 'pedro',
                'username' => 'TELCHI-pedro1',
                'phone' => '7601111131',
                'email' => 'pedro@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id'=> 1
            ],
            [
                'name' => 'maria',
                'username' => 'TELCHI-maria1',
                'phone' => '76411131',
                'email' => 'maria@gmail.com',
                'password' => Hash::make('123'),
                'laboratory_id'=> 1
            ]
           
        ]);
         $user=User::factory(60)->create();
      /*  foreach($user as $use){
            $use->permissions()->attach([
                rand(1,3)
            ]);
        }*/

        
    }

}