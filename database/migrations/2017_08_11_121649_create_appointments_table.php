<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments  ('id');
            $table->integer     ('booking_id')          ->unsigned();
            $table->integer     ('transaction_id')      ->unsigned();

            $table->dateTime    ('date_start')          ->nullable();
            $table->dateTime    ('date_end')            ->nullable();

            $table->integer     ('amount')              ->default('0');

            $table->integer     ('status_id')           ->unsigned();
            $table->integer     ('carer_status_id')     ->unsigned();
            $table->integer     ('purchaser_status_id') ->unsigned();

            $table->timestamps();
            //--------------------------------------------------------------
            $table->index('booking_id');
            $table->index('transaction_id');
            $table->index('status_id');
            $table->index('carer_status_id');
            $table->index('purchaser_status_id');
            //--------------------------------------------------------------
            $table->foreign('booking_id')           ->references('id')->on('bookings');
            $table->foreign('transaction_id')       ->references('id')->on('transactions');
            $table->foreign('status_id')            ->references('id')->on('booking_appointment_statuses');
            $table->foreign('carer_status_id')      ->references('id')->on('booking_appointment_statuses');
            $table->foreign('purchaser_status_id')  ->references('id')->on('booking_appointment_statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
