<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesInAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function($table) {
            $table->string('time_from', 5);
            $table->string('time_to', 5);
            $table->enum('periodicity', ['single', 'daily', 'weekly']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointments', function($table) {
            $table->dropColumn('time_from');
            $table->dropColumn('time_to');
            $table->dropColumn('periodicity');
        });
    }
}
