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
            $table->float('descuento');
            $table->string('detalle');
            $table->string('doc')->nullable();
            $table->integer('estado')->default(1);
            $table->float('precio');
            $table->float('total');
            $table->unsignedBigInteger('pacienteId');
            $table->unsignedBigInteger('enfermeroId');
            $table->unsignedBigInteger('pruebaId');
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
