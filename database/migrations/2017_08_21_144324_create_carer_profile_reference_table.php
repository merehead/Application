<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarerProfileReferenceTable extends Migration
{
    public function up()
    {
        Schema::create('carer_profile_reference', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('carer_profile_id')->unsigned();
            $table->integer('reference_id')->unsigned();
            $table->timestamps();

            $table->index('carer_profile_id');
            $table->index('reference_id');

            $table->foreign('carer_profile_id')->references('id')->on('carers_profiles');
            $table->foreign('reference_id')->references('id')->on('carers_references');
        });
    }


    public function down()
    {
        Schema::dropIfExists('carer_profile_reference');
    }
}
