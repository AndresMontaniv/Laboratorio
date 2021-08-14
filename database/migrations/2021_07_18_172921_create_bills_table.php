<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('nit')->nullable();
            $table->timestamp('fecha');
            $table->decimal('importe')->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->integer('status')->default('1');
            $table->foreignId('analysis_id')->constrained('analyses');
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
        Schema::dropIfExists('bills');
    }
}
