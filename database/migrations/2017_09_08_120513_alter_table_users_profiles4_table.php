<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersProfiles4Table extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function (Blueprint $table) {

            $table->string      ('assistance_with_dressings'  , 12)->nullable();
            $table->string      ('dressings_detail'            , 256)->nullable();
            $table->string      ('other_medical_conditions'        , 12)->nullable();
            $table->string      ('other_medical_detail'            , 256)->nullable();
            $table->string      ('food_allergies'                   , 12)->nullable();
            $table->string      ('food_allergies_detail'            , 256)->nullable();
            $table->string      ('dietary_requirements'            , 12)->nullable();
            $table->string      ('dietary_requirements_interaction', 256)->nullable();
            $table->string      ('special_dietary_requirements'     , 12)->nullable();
            $table->string      ('special_dietary_requirements_detail', 256)->nullable();
            $table->string      ('prepare_food'                   , 12)->nullable();
            $table->string      ('assistance_with_preparing_food'   , 256)->nullable();
            $table->string      ('preferences_of_food'                   , 12)->nullable();
            $table->string      ('preferences_of_food_requirements' , 256)->nullable();
            $table->string      ('assistance_with_eating'                   , 12)->nullable();
            $table->string      ('assistance_with_eating_detail'            , 256)->nullable();
            $table->string      ('assistance_with_personal_hygiene'  , 12)->nullable();
            $table->string      ('appropriate_clothes'  , 12)->nullable();
            $table->string      ('assistance_getting_dressed'                   , 12)->nullable();
            $table->string      ('assistance_getting_dressed_detail'            , 256)->nullable();
            $table->string      ('assistance_with_bathing'                   , 12)->nullable();
            $table->string      ('bathing_times_per_week'            , 12)->nullable();
            $table->string      ('managing_toilet_needs'                   , 12)->nullable();
            $table->string      ('mobilising_to_toilet'            , 12)->nullable();
            $table->string      ('cleaning_themselves'                   , 12)->nullable();
            $table->string      ('have_incontinence'            , 12)->nullable();
            $table->string      ('kind_of_incontinence', 256)->nullable();
            $table->string      ('incontinence_wear'     , 12)->nullable();
            $table->string      ('incontinence_products_stored', 256)->nullable();
            $table->string      ('choosing_incontinence_products'            , 12)->nullable();
            $table->string      ('other_behaviour'            , 256)->nullable();
            $table->string      ('consent'            , 12)->nullable();
            $table->string      ('consent_details'            , 256)->nullable();
            $table->string      ('getting_dressed_for_bed'            , 12)->nullable();
            $table->string      ('getting_ready_for_bed'            , 12)->nullable();
            $table->datetime    ('time_to_bed'            )->nullable();
            $table->string      ('keeping_safe_at_night'            , 12)->nullable();
            $table->string      ('keeping_safe_at_night_details'            , 256)->nullable();
            $table->datetime    ('time_to_night_helping'            )->nullable();
            $table->string      ('toilet_at_night?'            , 12)->nullable();
            $table->string      ('helping_toilet_at_night'            , 12)->nullable();
            //$table->string      ('keeping_safe_at_night'            , 12)->nullable();
            //$table->string      ('keeping_safe_at_night_details'            , 256)->nullable();
            $table->string      ('religious_beliefs'            , 12)->nullable();
            $table->string      ('religious_beliefs_details'            , 256)->nullable();
            $table->string      ('particular_likes'            , 12)->nullable();
            $table->string      ('particular_likes_details'            , 256)->nullable();
            $table->string      ('socialising_with_other'            , 12)->nullable();
            //$table->string      ('particular_likes'            , 12)->nullable();
            //$table->string      ('particular_likes_details'            , 256)->nullable();
            $table->string      ('interests_hobbies'            , 12)->nullable();
            $table->string      ('interests_hobbies_details'            , 256)->nullable();
            $table->string      ('we_missed'            , 12)->nullable();
            $table->string      ('we_missed_details'            , 256)->nullable();
            $table->string      ('multiple_carers'            , 12)->nullable();
            $table->string      ('multiple_carers_details'            , 256)->nullable();
        });
    }
    public function down()
    {
        Schema::table('service_users_profiles', function (Blueprint $table) {

        });
    }
}
