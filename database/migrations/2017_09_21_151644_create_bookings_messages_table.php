<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings_messages', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('booking_id')->unsigned();
            $table->enum('sender', ['carer', 'service_user'])->nullable()->default(null);
            $table->enum('type', ['message', 'status_change']);
            $table->enum('new_status', ['pending', 'in_progress', 'completed', 'canceled'])->nullable()->default(null);
            $table->text('text')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('booking_id')->references('id')->on('bookings');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings_messages');
    }
}
