<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterSrvUserProfileAddFieldsByGigirnaStr250 extends Migration
{
    public function up()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->string      ('assistance_with_personal_hygiene_detail'           , 256)->nullable();
            $table->string      ('appropriate_clothes_assistance_detail', 256)->nullable();
            $table->string      ('assistance_with_bathing_detail', 256)->nullable();
            $table->string      ('managing_toilet_needs_detail', 256)->nullable();
            $table->string      ('mobilising_to_toilet_detail', 256)->nullable();
            $table->string      ('cleaning_themselves_detail', 256)->nullable();
            $table->string      ('incontinence_wear_detail', 256)->nullable();
            $table->string      ('choosing_incontinence_products_detail', 256)->nullable();
        });

    }

    public function down()
    {
        Schema::table('service_users_profiles', function($table) {
            $table->dropColumn('assistance_with_personal_hygiene_detail');
            $table->dropColumn('appropriate_clothes_assistance_detail');
            $table->dropColumn('assistance_with_bathing_detail');
            $table->dropColumn('managing_toilet_needs_detail');
            $table->dropColumn('mobilising_to_toilet_detail');
            $table->dropColumn('cleaning_themselves_detail');
            $table->dropColumn('incontinence_wear_detail');
            $table->dropColumn('choosing_incontinence_products_detail');
        });
    }
}


