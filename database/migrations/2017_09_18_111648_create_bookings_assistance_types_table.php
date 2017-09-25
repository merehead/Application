<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsAssistanceTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings_assistance_types', function (Blueprint $table) {
            $table->integer('booking_id')->unsigned();
            $table->integer('assistance_type_id')->unsigned();

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('assistance_type_id')->references('id')->on('assistance_types')->onDelete('cascade');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('bookings_assistance_types');
    }
}
