<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostcodesTable extends Migration
{
    public function up()
    {
        Schema::create('postcodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 16);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('postcodes');
    }
}
