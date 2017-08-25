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
            //$table->integer     ('transaction_id')      ->unsigned()->nullable();

            $table->dateTime    ('date_start')          ->nullable();
            $table->dateTime    ('date_end')            ->nullable();

            $table->integer     ('amount_for_purchaser')->default('0');
            $table->integer     ('amount_for_carer')    ->default('0');

            $table->integer     ('status_id')           ->unsigned()->default('0');

            $table->integer     ('carer_status_id')     ->unsigned()->default('0');
            $table->dateTime    ('carer_status_date')   ->nullable();

            $table->integer     ('purchaser_status_id') ->unsigned()->default('0');
            $table->dateTime    ('purchaser_status_date')->nullable();

            $table->timestamps();
            //--------------------------------------------------------------
            $table->index('booking_id');
            //$table->index('transaction_id');
            $table->index('status_id');
            $table->index('carer_status_id');
            $table->index('purchaser_status_id');
            //--------------------------------------------------------------
            $table->foreign('booking_id')           ->references('id')->on('bookings');
            //$table->foreign('transaction_id')       ->references('id')->on('appointment_payments');
            $table->foreign('status_id')            ->references('id')->on('appointment_statuses');
            $table->foreign('carer_status_id')      ->references('id')->on('appointment_user_statuses');
            $table->foreign('purchaser_status_id')  ->references('id')->on('appointment_user_statuses');
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
