<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarerProfileWorkingTimeTable extends Migration
{
    public function up()
    {
        Schema::create('carer_profile_working_time', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carer_profile_id')->unsigned();
            $table->integer('working_times_id')->unsigned();
            $table->timestamps();

            $table->index('carer_profile_id');
            $table->index('working_times_id');


            $table->foreign('carer_profile_id')->references('id')->on('carers_profiles');
            $table->foreign('working_times_id')->references('id')->on('working_times');
        });
    }


    public function down()
    {
        Schema::dropIfExists('carer_profile_working_time');
    }
}
