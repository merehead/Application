<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssistanceTypesTable extends Migration
{/*PERSONAL CARE
DEMENTIA CARE
HOUSEKEEPING
FOOD / NUTRITION
DRESSINGS AND WOUND MANAGEMENT
COMPANIONSHIP
TRAVEL / VISITS / EXCURSIONS
MEDICATION / TREATMENTS
MOBILITY
     */
    public function up()
    {
        Schema::create('assistance_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('assistance_types');
    }
}
