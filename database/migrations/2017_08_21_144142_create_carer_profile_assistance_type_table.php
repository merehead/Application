<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarerProfileAssistanceTypeTable extends Migration
{
    public function up()
    {
        Schema::create('carer_profile_assistance_type', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carer_profile_id')->unsigned();
            $table->integer('assistance_types_id')->unsigned();
            $table->timestamps();

            $table->index('carer_profile_id');
            $table->index('assistance_types_id');

            $table->foreign('carer_profile_id')->references('id')->on('carers_profiles');
            $table->foreign('assistance_types_id')->references('id')->on('assistance_types');
        });
    }


    public function down()
    {
        Schema::dropIfExists('carer_profile_assistance_type');
    }
}
