<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCarersProfiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carers_profiles', function($table){
            $table->integer('paid');
            $table->dateTime('driver_licence_valid_until')->nullable();
            $table->dateTime('car_insurance_valid_until')->nullable();
            //$table->string('sort_code',16)->nullable();
            //$table->string('account_number',32)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
