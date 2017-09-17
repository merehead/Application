<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CarersProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('carers_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer      ('title'                )->unsigned()->nullable();
            $table->string      ('first_name'           , 128)->nullable();
            $table->string      ('family_name'          , 128)->nullable();
            $table->string      ('like_name'            , 128)->nullable();
            $table->string      ('gender'               ,32)->nullable();          //male/female
            $table->string      ('mobile_number'        , 32)->nullable();
            $table->string      ('address_line1'        , 128)->nullable();
            $table->string      ('address_line2'        , 128)->nullable();
            $table->string      ('town'                 , 128)->nullable();
            //$table->integer     ('postcode_id'           )->unsigned()->nullable();
            $table->string      ('postcode'             ,32)->nullable();
            $table->dateTime    ('DoB'                   )->nullable();
            $table->string      ('criminal_conviction'  ,32)->nullable();          //yes.but../yes/no
            $table->string      ('criminal_detail'      ,512)->nullable();
            $table->string      ('DBS'                  ,8)->nullable();          //Yes/No
            $table->string      ('DBS_use'              ,8)->nullable();          //Yes/No
            $table->dateTime    ('dbs_date'              )->nullable();
            $table->string      ('DBS_identifier'       ,128)->nullable();
            $table->string      ('driving_licence'      ,8)->nullable();          //Yes/No
            $table->string      ('DBS_number'           ,128)->nullable();
            $table->string      ('have_car'             ,8)->nullable();          //Yes/No
            $table->string      ('use_car'              ,8)->nullable();          //Yes/No
            $table->string      ('work_at_holiday'      ,8)->nullable();          //Yes/No
            $table->string      ('times'                ,32)->nullable();          //Hourly/Daily/Weekly
            $table->integer     ('work_hours'            )->nullable()->default(1);
            $table->string      ('work_with_pets'       ,16)->nullable();          //Yes/No
            $table->string      ('pets_description'     ,256)->nullable();
            $table->string      ('language_additional'  ,256)->nullable();
            $table->string      ('work_UK'              ,8)->nullable();          //Yes/No
            $table->string      ('work_UK_restriction'  ,8)->nullable();          //Yes/No
            $table->string      ('work_UK_description'  ,256)->nullable();
            $table->string      ('national_insurance_number',256)->nullable();
            $table->string      ('description_yourself' ,1024)->nullable();
            $table->string      ('sentence_yourself'    ,512)->nullable();
            $table->string      ('have_questions'       ,8)->nullable();          //Yes/No
            $table->string      ('questions'            ,1024)->nullable();
            $table->string      ('sort_code'            ,16)->nullable();
            $table->string      ('account_number'       ,32)->nullable();
            $table->string      ('registration_progress',16)->nullable();          //step number
            $table->integer('paid')->nullable();;
            $table->dateTime('driver_licence_valid_until')->nullable();
            $table->dateTime('car_insurance_valid_until')->nullable();
            $table->timestamps();

/*            $table->index('postcode_id');

            $table->foreign('postcode_id')         ->references('id')->on('postcodes');*/
        });
    }


    public function down()
    {
        Schema::dropIfExists('carers_profiles');
    }
}
