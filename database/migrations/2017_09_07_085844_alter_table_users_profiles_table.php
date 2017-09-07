<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_users_profiles', function (Blueprint $table) {


            $table->datetime      ('start_date'                       )->nullable();
            $table->string      ('kind_of_building'         , 12)->nullable();
            $table->string      ('lift_available'           , 3)->nullable();
            $table->integer      ('floor_id'                             )->unsigned()->nullable();
            $table->string      ('move_available'           , 12)->nullable();
            $table->string      ('assistance_moving'        , 12)->nullable();
            $table->string      ('home_safe'                , 12)->nullable();
            $table->string      ('assistance_keeping'       , 12)->nullable();
            $table->string      ('own_pets'                 , 16)->nullable();
            $table->string      ('pet_detail'               , 256)->nullable();
            $table->string      ('pet_friendly'             , 12)->nullable();
            $table->string      ('anyone_else_live'         , 12)->nullable();
            $table->string      ('anyone_detail'            , 256)->nullable();
            $table->string      ('anyone_friendly'          , 12)->nullable();
            $table->string      ('carer_enter'              , 256)->nullable();
            $table->string      ('entering_aware'           , 12)->nullable();
            $table->string      ('other_detail'             , 256)->nullable();
            $table->string      ('conditions_detail'        , 256)->nullable();
            //index floor

            $table->index('floor_id');

            $table->foreign('floor_id')         ->references('id')->on('floors');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
                $table->dropColumn      ('start_date');
             $table->dropColumn      ('kind_of_building');
             $table->dropColumn      ('lift_available');
             $table->dropColumn      ('floor');
             $table->dropColumn      ('move_available');
             $table->dropColumn      ('assistance_moving');
             $table->dropColumn      ('home_safe');
             $table->dropColumn      ('assistance_keeping');
             $table->dropColumn      ('own_pets');
             $table->dropColumn      ('pet_detail');
             $table->dropColumn      ('pet_friendly');
             $table->dropColumn      ('anyone_else_live');
             $table->dropColumn      ('anyone_detail');
             $table->dropColumn      ('anyone_friendly');
             $table->dropColumn      ('carer_enter');
             $table->dropColumn      ('entering_aware');
             $table->dropColumn      ('other_detail');
             $table->dropColumn      ('conditions_detail');
        });
    }
}
