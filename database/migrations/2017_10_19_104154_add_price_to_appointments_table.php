<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceToAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function($table) {
            $table->float('price_for_purchaser')->after('periodicity')->nullable()->default(null);
            $table->float('price_for_carer')->after('price_for_purchaser')->nullable()->default(null);
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
            $table->dropColumn('price_for_purchaser');
            $table->dropColumn('price_for_carer');
        });
    }
}
