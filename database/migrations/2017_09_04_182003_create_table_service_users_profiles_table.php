<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableServiceUsersProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_users_profiles', function (Blueprint $table) {
            $table->increments('id');


            $table->integer     ('purchaser_id'            )->unsigned();

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

                        $table->index('purchaser_id');

                        $table->foreign('purchaser_id')         ->references('id')->on('purchasers_profiles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_users_profiles');
    }
}
