<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasersProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchasers_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string      ('purchasing_care_for', 16)->nullable();
            $table->integer     ('title'                )->unsigned()->nullable();
            $table->string      ('first_name'           , 128)->nullable();
            $table->string      ('family_name'          , 128)->nullable();
            $table->string      ('like_name'            , 128)->nullable();
            $table->string      ('gender'               ,32)->nullable();          //male/female
            $table->string      ('mobile_number'        , 32)->nullable();
            $table->string      ('address_line1'        , 128)->nullable();
            $table->string      ('address_line2'        , 128)->nullable();
            $table->string      ('town'                 , 128)->nullable();
           // $table->integer     ('postcode_id'           )->unsigned()->nullable();
            $table->string      ('postcode'  ,32)->nullable();
            $table->dateTime    ('DoB'                   )->nullable();

            $table->string      ('registration_progress',16)->nullable();          //step number
            $table->timestamps();

/*            $table->index('postcode_id');

            $table->foreign('postcode_id')         ->references('id')->on('postcodes');*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasers_profiles');
    }
}
