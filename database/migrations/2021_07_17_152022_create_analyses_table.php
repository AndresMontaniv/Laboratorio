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
            $table->float('discount');
            $table->string('detail');
            $table->string('doc')->nullable();
            $table->Integer('status')->default('1');
            $table->float('price');
            $table->float('total');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('nurse_id');
            $table->unsignedBigInteger('invoice_id')->nullable();
            $table->foreign('patient_id')->references('id')->on('users');
            $table->foreign('nurse_id')->references('id')->on('users');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreignId('test_id')->constrained('tests');
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
