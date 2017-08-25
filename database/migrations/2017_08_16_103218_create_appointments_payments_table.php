<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointment_payments', function (Blueprint $table) {
            $table->increments  ('id');
            $table->integer  ('appointment_id')          ->unsigned();
            $table->bigInteger     ('carer_id')                ->unsigned();
            $table->string      ('transaction_id',128)->nullable();

            $table->integer     ('amount')                  ->nullable();

            $table->timestamp   ('created')                 ->nullable();
            $table->string      ('description',256)    ->nullable();

            $table->timestamps();
            //--------------------------------------------------------------
            $table->index('appointment_id');
            $table->index('carer_id');

            //--------------------------------------------------------------
            $table->foreign('appointment_id')->references('id')->on('appointments');
            $table->foreign('carer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment_payments');
    }
}
