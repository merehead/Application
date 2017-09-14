<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXtableServiceUserConditionsToServiceUserProfileTable extends Migration
{
    public function up()
    {
        Schema::create('servUserProfile_servUserCondition', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_user_profile_id')->unsigned();
            $table->integer('service_user_conditions_id')->unsigned();
            $table->timestamps();

            $table->index('service_user_profile_id','srvUserProfileId');
            $table->index('service_user_conditions_id','srvUserCondition');

            $table->foreign('service_user_profile_id','srvUser_conditions')->references('id')->on('service_users_profiles');
            $table->foreign('service_user_conditions_id','conditions_srvUser')->references('id')->on('service_user_conditions');
        });
    }


    public function down()
    {
        Schema::dropIfExists('servUserProfile_servUserCondition');
    }
}
