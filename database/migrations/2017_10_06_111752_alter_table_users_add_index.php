<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUsersAddIndex extends Migration
{
    public function up()
    {
        Schema::table('users', function($table) {
            $table->index('referral_code');
            $table->index('own_referral_code')->unique();

            $table->foreign('referral_code')->references('own_referral_code')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropIndex('referral_code');
            $table->dropUnique('own_referral_code');
        });
    }



}
