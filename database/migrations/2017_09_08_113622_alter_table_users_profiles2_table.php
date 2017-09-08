<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersProfiles2Table extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function (Blueprint $table) {
            $table->string      ('have_condition'           , 64)->nullable();
            $table->string      ('have_dementia'            , 16)->nullable();
            $table->string      ('dementia_detail'          , 256)->nullable();
            $table->string      ('help_with_mobility'       , 12)->nullable();
            $table->string      ('history_of_falls'         , 12)->nullable();
            $table->string      ('falls_detail'             , 256)->nullable();
            $table->string      ('mobility_bed'             , 12)->nullable();
            $table->string      ('mobility_bed_detail'      , 256)->nullable();
            $table->string      ('mobility_home'            , 12)->nullable();
            $table->string      ('mobility_home_detail'     , 256)->nullable();
            $table->string      ('mobility_shopping'        , 12)->nullable();
            $table->string      ('mobility_shopping_detail' , 256)->nullable();
            $table->string      ('communication'            , 12)->nullable();
            $table->string      ('vision'                   , 12)->nullable();
            $table->string      ('vision_detail'            , 256)->nullable();
        });
    }
    public function down()
    {
        Schema::table('service_users_profiles', function (Blueprint $table) {

            $table->dropColumn      ('have_condition');
            $table->dropColumn      ('have_dementia');
            $table->dropColumn      ('dementia_detail');
            $table->dropColumn      ('help_with_mobility');
            $table->dropColumn      ('history_of_falls');
            $table->dropColumn      ('falls_detail');
            $table->dropColumn      ('mobility_bed');
            $table->dropColumn      ('mobility_bed_detail');
            $table->dropColumn      ('mobility_home');
            $table->dropColumn      ('mobility_home_detail');
            $table->dropColumn      ('mobility_shopping');
            $table->dropColumn      ('mobility_shopping_detail');
            $table->dropColumn      ('communication');
            $table->dropColumn      ('vision');
            $table->dropColumn      ('vision_detail');
        });
    }
}
