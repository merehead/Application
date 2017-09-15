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
            $table->string      ('have_condition'           , 64)->nullable();
            $table->string      ('have_dementia'            , 16)->nullable();
            $table->string      ('dementia_detail'          , 256)->nullable();
            $table->string      ('help_with_mobility'       , 12)->nullable();
            $table->string      ('history_of_falls'         , 12)->nullable();
            $table->string      ('falls_detail'             , 256)->nullable();
            $table->string      ('mobility_bed'             , 12)->nullable();
            $table->string      ('mobility_bed_detail'      , 256)->nullable();
            $table->string      ('mobility_home'            , 12)->nullable();
            $table->string      ('mobility_home_detail'     , 256)->nullable();
            $table->string      ('mobility_shopping'        , 12)->nullable();
            $table->string      ('mobility_shopping_detail' , 256)->nullable();
            $table->string      ('communication'            , 12)->nullable();
            $table->string      ('vision'                   , 12)->nullable();
            $table->string      ('vision_detail'            , 256)->nullable();

            $table->string      ('hearing'                   , 12)->nullable();
            $table->string      ('hearing_detail'            , 256)->nullable();
            $table->string      ('speech'                   , 12)->nullable();
            $table->string      ('speech_detail'            , 256)->nullable();
            $table->string      ('comprehension'                   , 12)->nullable();
            $table->string      ('comprehension_detail'            , 256)->nullable();
            $table->string      ('other_languages'            , 256)->nullable();
            $table->string      ('social_interaction'                   , 12)->nullable();
            $table->string      ('visit_for_companionship'     , 12)->nullable();
            $table->string      ('long_term_conditions'            , 256)->nullable();
            $table->string      ('have_any_allergies'                   , 12)->nullable();
            $table->string      ('allergies_detail'            , 256)->nullable();
            $table->string      ('assistance_in_medication'                   , 12)->nullable();
            $table->string      ('in_medication_detail'            , 256)->nullable();
            $table->string      ('skin_scores'                   , 12)->nullable();
            $table->string      ('skin_scores_detail'            , 256)->nullable();

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
            $table->string      ('toilet_at_night'            , 12)->nullable();
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
            $table->datetime      ('start_date'                       )->nullable();
            $table->string      ('kind_of_building'         , 12)->nullable();
            $table->string      ('lift_available'           , 3)->nullable();
            $table->integer      ('floor_id'                             )->unsigned()->nullable();
            $table->string      ('move_available'           , 12)->nullable();
            $table->string      ('assistance_moving'        , 12)->nullable();
            $table->string      ('home_safe'                , 12)->nullable();
            $table->string      ('assistance_keeping'       , 12)->nullable();
            $table->string      ('own_pets'                 , 16)->nullable();
            $table->string      ('pet_detail'               , 256)->nullable();
            $table->string      ('pet_friendly'             , 12)->nullable();
            $table->string      ('anyone_else_live'         , 12)->nullable();
            $table->string      ('anyone_detail'            , 256)->nullable();
            $table->string      ('anyone_friendly'          , 12)->nullable();
            $table->string      ('carer_enter'              , 256)->nullable();
            $table->string      ('entering_aware'           , 12)->nullable();
            $table->string      ('other_detail'             , 256)->nullable();
            $table->string      ('conditions_detail'        , 256)->nullable();

            $table->timestamps();


            $table->index('floor_id');
            $table->index('purchaser_id');

            $table->foreign('floor_id')         ->references('id')->on('floors');
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
