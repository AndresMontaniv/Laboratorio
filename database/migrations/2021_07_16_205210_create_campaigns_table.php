<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->float("discount")->nullable();
            // $table->string("imagen")->nullable();
            $table->date("expiration");
            $table->date("initialDate");

            $table->text("body");
            $table->text("discountCode")->unique();
            $table->text("title");
            $table->Integer('status')->default('1');
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
        Schema::dropIfExists('campaigns');
    }
}
