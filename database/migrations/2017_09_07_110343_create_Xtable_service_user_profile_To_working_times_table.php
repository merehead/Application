<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXtableServiceUserProfileToWorkingTimesTable extends Migration
{
    public function up()
    {
        Schema::create('service_user_profile_working_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_user_profile_id')->unsigned();
            $table->integer('working_times_id')->unsigned();
            $table->timestamps();

            $table->index('service_user_profile_id');
            $table->index('working_times_id');


            $table->foreign('service_user_profile_id','srvUser_workTimes')->references('id')->on('service_users_profiles');
            $table->foreign('working_times_id')->references('id')->on('working_times');
        });
    }


    public function down()
    {
        Schema::dropIfExists('service_user_profile_working_time');
    }
}
