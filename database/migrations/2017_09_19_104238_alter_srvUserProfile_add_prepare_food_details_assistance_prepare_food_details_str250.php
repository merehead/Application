<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSrvUserProfileAddPrepareFoodDetailsAssistancePrepareFoodDetailsStr250 extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->string      ('prepare_food_details'           , 256)->nullable();
            $table->string      ('assistance_prepare_food_details', 256)->nullable();
        });

    }

    public function down()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->dropColumn('prepare_food_details');
            $table->dropColumn('assistance_prepare_food_details');
        });
    }
}
