<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersProfiles3Table extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function (Blueprint $table) {

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
        });
    }
    public function down()
    {
        Schema::table('service_users_profiles', function (Blueprint $table) {

            $table->dropColumn      ('hearing');
            $table->dropColumn      ('hearing_detail');
            $table->dropColumn      ('speech');
            $table->dropColumn      ('hearing_detail');
            $table->dropColumn      ('comprehension');
            $table->dropColumn      ('comprehension_detail');
            $table->dropColumn      ('other_languages');
            $table->dropColumn      ('social_interaction');
            $table->dropColumn      ('visit_for_companionship');
            $table->dropColumn      ('long_term_conditions');
            $table->dropColumn      ('have_any_allergies');
            $table->dropColumn      ('allergies_detail');
            $table->dropColumn      ('assistance_in_medication');
            $table->dropColumn      ('in_medication_detail');
            $table->dropColumn      ('skin_scores');
            $table->dropColumn      ('skin_scores_detail');
        });
    }
}
