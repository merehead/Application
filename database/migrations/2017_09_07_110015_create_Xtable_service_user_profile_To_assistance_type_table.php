<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXtableServiceUserProfileToAssistanceTypeTable extends Migration
{
    public function up()
    {
        Schema::create('service_user_profile_assistance_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_user_profile_id')->unsigned();
            $table->integer('assistance_types_id')->unsigned();
            $table->timestamps();

            $table->index('service_user_profile_id','srvUserProfileId');
            $table->index('assistance_types_id');

            $table->foreign('service_user_profile_id','srvUser_assistantType')->references('id')->on('service_users_profiles');
            $table->foreign('assistance_types_id','assistantType_srvUser')->references('id')->on('assistance_types');
        });
    }


    public function down()
    {
        Schema::dropIfExists('service_user_profile_assistance_type');
    }
}
