<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusPayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonus_payouts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('bonus_type_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('referral_user_id')->unsigned()->nullable()->default(null);
            $table->float('amount');
            $table->boolean('payout')->default(false);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('referral_user_id')->references('id')->on('users');
            $table->foreign('bonus_type_id')->references('id')->on('bonuses_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonus_payouts');
    }
}
