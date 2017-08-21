<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarerProfileServiceTypeTable extends Migration
{
    public function up()
    {
        Schema::create('carer_profile_service_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carer_profile_id')->unsigned();
            $table->integer('service_type_id')->unsigned();
            $table->timestamps();

            $table->index('carer_profile_id');
            $table->index('service_type_id');

            $table->foreign('carer_profile_id')->references('id')->on('carers_profiles');
            $table->foreign('service_type_id')->references('id')->on('service_types');
        });
    }


    public function down()
    {
        Schema::dropIfExists('carer_profile_service_type');
    }
}
