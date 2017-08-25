<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('booking_payments', function (Blueprint $table) {
            $table->increments  ('id');
            $table->integer  ('booking_id')              ->unsigned();
            $table->bigInteger     ('purchaser_id')            ->unsigned();
            $table->string      ('transaction_id',128)->nullable();

            $table->integer     ('amount')                  ->nullable();

            $table->timestamp   ('created')                 ->nullable();
            $table->string      ('description',256)   ->nullable();

            $table->timestamps();
            //--------------------------------------------------------------
            $table->index('booking_id');
            $table->index('purchaser_id');

            //--------------------------------------------------------------
            $table->foreign('booking_id')->references('id')->on('bookings');
            $table->foreign('purchaser_id')->references('id')->on('users');
            //$table->foreign('transaction_id')->references('id')->on('transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_payments');
    }
}
