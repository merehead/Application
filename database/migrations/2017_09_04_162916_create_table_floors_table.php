<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFloorsTable extends Migration
{
    public function up()
    {

        Schema::create('floors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 8)->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('floors');
    }
}
