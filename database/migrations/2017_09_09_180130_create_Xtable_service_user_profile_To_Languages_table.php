<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXtableServiceUserProfileToLanguagesTable extends Migration
{
    public function up()
    {
        Schema::create('service_user_profile_language', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('services_user_profile_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->timestamps();

            $table->index('services_user_profile_id');
            $table->index('language_id');

            $table->foreign('services_user_profile_id')->references('id')->on('service_users_profiles');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }


    public function down()
    {
        Schema::dropIfExists('service_user_profile_language');
    }
}
