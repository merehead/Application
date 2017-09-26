<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDressedForBedDetailsToiledHelpDetailsToSrvUserProfile extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->string      ('dressed_for_bed_details'           , 512)->nullable();
            $table->string      ('toiled_help_details'           , 512)->nullable();

        });

    }

    public function down()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->dropColumn('dressed_for_bed_details');
            $table->dropColumn('toiled_help_details');
        });
    }
}
