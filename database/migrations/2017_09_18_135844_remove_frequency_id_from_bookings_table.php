<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveFrequencyIdFromBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_frequency_id_foreign');
            $table->dropIndex('bookings_frequency_id_index');
            $table->dropColumn('frequency_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->integer('frequency_id')->unsigned();
            $table->foreign('frequency_id')->references('id')->on('booking_appointment_frequencies');
            $table->index('frequency_id');
        });
    }
}
