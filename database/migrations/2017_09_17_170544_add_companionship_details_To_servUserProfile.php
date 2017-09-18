<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanionshipDetailsToServUserProfile extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->string      ('companionship_interaction_details'           , 256)->nullable();
            $table->string      ('companionship_visit_details'                 , 256)->nullable();
        });

    }

    public function down()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->dropColumn('companionship_interaction_details');
            $table->dropColumn('companionship_visit_details');
        });
    }
}
