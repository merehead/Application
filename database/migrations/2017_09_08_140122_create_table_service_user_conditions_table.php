<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServiceUserConditionsTable extends Migration
{
    public function up()
    {
        Schema::create('service_user_conditions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('service_user_conditions');
    }
}
