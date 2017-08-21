<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarerProfileLangugesTable extends Migration
{
    public function up()
    {
        Schema::create('carer_profile_language', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carer_profile_id')->unsigned();
            $table->integer('language_id')->unsigned();
            $table->timestamps();

            $table->index('carer_profile_id');
            $table->index('language_id');

            $table->foreign('carer_profile_id')->references('id')->on('carers_profiles');
            $table->foreign('language_id')->references('id')->on('languages');
        });
    }


    public function down()
    {
        Schema::dropIfExists('carer_profile_language');
    }
}
