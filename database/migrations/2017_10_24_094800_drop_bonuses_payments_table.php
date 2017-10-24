<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBonusesPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bonuses_payments');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('bonuses_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('referral_donor')->unsigned()->nullable()->default(null);
            $table->integer('bonus_type_id')->unsigned()->nullable()->default(null);
            $table->float('amount');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('referral_donor')->references('id')->on('users');
            $table->foreign('bonus_type_id')->references('id')->on('bonuses_types');
        });
    }
}
