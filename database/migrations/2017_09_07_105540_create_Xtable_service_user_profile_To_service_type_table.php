<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXtableServiceUserProfileToServiceTypeTable extends Migration
{
    public function up()
    {
        Schema::create('service_user_profile_service_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_user_profile_id')->unsigned();
            $table->integer('service_type_id')->unsigned();
            $table->timestamps();

            $table->index('service_user_profile_id');
            $table->index('service_type_id');

            $table->foreign('service_user_profile_id','srvUser_srvType')->references('id')->on('service_users_profiles');
            $table->foreign('service_type_id')->references('id')->on('service_types');
        });
    }


    public function down()
    {
        Schema::dropIfExists('service_user_profile_service_type');
    }
}
