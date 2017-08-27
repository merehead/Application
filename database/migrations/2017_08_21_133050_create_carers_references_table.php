<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarersReferencesTable extends Migration
{
    public function up()
    {
        Schema::create('carers_references', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->string('job_title', 64);
            $table->string('relationship', 64);
            $table->string('phone', 64);
            $table->string('email', 128);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('carers_references');
    }
}
