<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSrvUserProfileAddCommonMobilityDetailsStr250 extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->string      ('common_mobility_details'           , 256)->nullable();
        });

    }

    public function down()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->dropColumn('common_mobility_details');

        });
    }
}
