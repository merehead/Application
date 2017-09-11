<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingTimesTable extends Migration
{
    public function up()
    {
        Schema::create('working_times', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64);
            $table->string('css_name', 128);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('working_times');
    }
}