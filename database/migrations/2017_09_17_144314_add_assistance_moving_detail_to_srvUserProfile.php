<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAssistanceMovingDetailToSrvUserProfile extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->string      ('assistance_moving_details'                 , 256)->nullable();
            $table->string      ('one_line_about'                 , 256)->nullable();
        });

    }

    public function down()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->dropColumn('assistance_moving_details');
            $table->dropColumn('one_line_about');
        });
    }
}
