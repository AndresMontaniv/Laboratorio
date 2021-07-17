<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Analysis;
use App\Models\Invoice;
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

        $analysis1= new Analysis();
        $analysis1->descuento=0.25;
        $analysis1->detalle="detalle1";
        $analysis1->doc="doc1";
        $analysis1->precio=100;
        $analysis1->total=75;
        $analysis1->pacienteId=1;
        $analysis1->enfermeroId=1;
        $analysis1->pruebaId=1;
        $analysis1->save();

        $analysis2= new Analysis();
        $analysis2->descuento=0;
        $analysis2->detalle="detalle2";
        $analysis2->doc="doc2";
        $analysis2->precio=200;
        $analysis2->total=200;
        $analysis2->pacienteId=2;
        $analysis2->enfermeroId=2;
        $analysis2->pruebaId=2;
        $analysis2->save();

        $invoice1= new Invoice();
        $invoice1->descuento=0.25;
        $invoice1->nit="123456789";
        $invoice1->precioNeto=100;
        $invoice1->precioBruto=125;
        $invoice1->userId=1;
        $invoice1->save();

        $invoice2= new Invoice();
        $invoice2->descuento=0.15;
        $invoice2->nit="987654321";
        $invoice2->precioNeto=200;
        $invoice2->precioBruto=225;
        $invoice2->userId=1;
        $invoice2->save();
        

    }
}
