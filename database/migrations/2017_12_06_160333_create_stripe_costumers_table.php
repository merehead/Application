<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripeCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_costumers', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('purchaser_id')->unsigned();
            $table->string('token');
            $table->string('last_four');
            $table->timestamps();

            $table->foreign('purchaser_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stripe_costumers');
    }
}
