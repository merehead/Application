<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTablePurchaserProfilesAddRegistrationStatusAddProfileStaus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('purchasers_profiles', function($table) {
            $table->string('registration_status',10)->default('new');   //new/completed/editing
            $table->integer('profiles_status_id')->unsigned()->default(1); //default -> 1 == New //relation to user_statuses

            $table->index('registration_status');
            $table->index('profiles_status_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('purchasers_profiles', function($table) {


            $table->dropIndex('purchasers_profiles_registration_status_index');
            $table->dropIndex('purchasers_profiles_profiles_status_id_index');

            $table->dropColumn('registration_status');
            $table->dropColumn('profiles_status_id');
        });

    }
}
