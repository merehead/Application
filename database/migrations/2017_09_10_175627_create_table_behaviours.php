<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBehaviours extends Migration
{
    public function up()
    {
        Schema::create('behaviours', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('behaviours');
    }
}
