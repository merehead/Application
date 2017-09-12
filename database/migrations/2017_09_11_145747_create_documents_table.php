<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('file_name',255);
            $table->string('title',255);
            $table->enum('type',[
                'nvq',
                'care_certificate',
                'health_and_social',
                'training_certificate',
                'additional_training_course',
                'other_relevant_qualification',
                'car_insurance_photo',
                'driving_licence_photo',
                'dbs_certificate_photo',
            ]);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
