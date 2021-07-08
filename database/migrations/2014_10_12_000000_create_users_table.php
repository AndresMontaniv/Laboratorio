<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->Integer('status')->default('1');
            $table->string('username')->unique()->nullable();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->string('phone')->nullable();
            $table->string('ci')->nullable();
            $table->date('birthday')->nullable();
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->unsignedBigInteger('laboratory_id')->nullable();
            $table->foreign('laboratory_id')->references('id')->on('laboratories');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
