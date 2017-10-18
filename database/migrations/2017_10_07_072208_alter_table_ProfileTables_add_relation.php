<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableProfileTablesAddRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('carers_profiles', function($table) {
            $table->foreign('profiles_status_id')->references('id')->on('user_statuses');
        });
        Schema::table('purchasers_profiles', function($table) {
            $table->foreign('profiles_status_id')->references('id')->on('user_statuses');
        });
        Schema::table('service_users_profiles', function($table) {
            $table->foreign('profiles_status_id')->references('id')->on('user_statuses');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carers_profiles', function($table) {
            $table->dropForeign('carers_profiles_profiles_status_id_foreign');
        });
        Schema::table('purchasers_profiles', function($table) {
            $table->dropForeign('purchasers_profiles_profiles_status_id_foreign');
        });
        Schema::table('service_users_profiles', function($table) {
            $table->dropForeign('service_users_profiles_profiles_status_id_foreign');
        });
    }
}
