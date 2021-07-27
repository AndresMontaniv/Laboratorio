<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            $table->float('discount')->default(0);
            $table->string('detail')->nullable();
            $table->string('doc')->nullable();
            $table->Integer('status')->default('1');
            $table->float('price')->nullable();
            $table->float('total')->nullable();
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('lab_id')->nullable();
            $table->unsignedBigInteger('nurse_id');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('lab_id')->references('id')->on('laboratories');
            $table->foreign('nurse_id')->references('id')->on('users');
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
        Schema::dropIfExists('analyses');
    }
}
