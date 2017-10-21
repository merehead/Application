<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangesInAppintmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('appointments', function($table) {
            $table->dropColumn('date_end');
            $table->dropColumn('amount_for_purchaser');
            $table->dropColumn('amount_for_carer');
            $table->boolean('payout')->default(false)->after('price_for_carer');
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
            $table->dropColumn('payout');

            $table->dateTime('date_end')->nullable()->after('date_start');
            $table->integer('amount_for_purchaser')->default('0')->after('date_end');
            $table->integer('amount_for_carer')->default('0')->after('amount_for_purchaser');
        });
    }
}
