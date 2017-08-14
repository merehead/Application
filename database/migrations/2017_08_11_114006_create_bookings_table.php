<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments  ('id');
            $table->bigInteger     ('purchaser_id')        ->unsigned();
            $table->bigInteger     ('service_user_id')     ->unsigned();
            $table->bigInteger     ('carer_id')            ->unsigned();

            $table->dateTime    ('date_start')          ->nullable();
            $table->dateTime    ('date_end')            ->nullable();

            $table->integer     ('frequency_id')        ->unsigned();
            $table->integer     ('amount')              ->default('0');

            $table->integer     ('status_id')           ->unsigned();
            $table->integer     ('carer_status_id')     ->unsigned();
            $table->integer     ('purchaser_status_id') ->unsigned();

            $table->timestamps();
            //--------------------------------------------------------------
            $table->index('purchaser_id');
            $table->index('service_user_id');
            $table->index('carer_id');
            $table->index('frequency_id');
            $table->index('status_id');
            $table->index('carer_status_id');
            $table->index('purchaser_status_id');
            //--------------------------------------------------------------
            $table->foreign('purchaser_id')         ->references('id')->on('users');
            $table->foreign('service_user_id')      ->references('id')->on('users');
            $table->foreign('carer_id')             ->references('id')->on('users');
            $table->foreign('frequency_id')         ->references('id')->on('booking_appointment_frequencies');
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
        Schema::dropIfExists('bookings');
    }
}
