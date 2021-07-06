<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboratoryPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laboratory_plans', function (Blueprint $table) {
            $table->id();
            $table->date('expirationDate')->nullable();
            $table->Integer('status')->default('0');
            $table->date('initialDate');
            $table->foreignId('plan_id')->constrained('plans');
            $table->foreignId('laboratory_id')->constrained('laboratories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laboratory_plans');
    }
}
