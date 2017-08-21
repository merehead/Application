<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTypesTable extends Migration
{

    /*SINGLE / REGULAR VISITS
     *LIVE IN CARE
     *RESPITE CARE
     * */
    public function up()
    {
        Schema::create('service_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('service_types');
    }
}
