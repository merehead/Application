<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDisputePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('dispute_payments');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('dispute_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->nullable();
            $table->string('css_name', 64)->nullable();
            $table->integer('appointment_id')->nullable()->unsigned();
            $table->integer('amount')->nullable();
            $table->timestamps();

            $table->index('appointment_id');

            $table->foreign('appointment_id')->references('id')->on('appointments');
        });
    }
}
