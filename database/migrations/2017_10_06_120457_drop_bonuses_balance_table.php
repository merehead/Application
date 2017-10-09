<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBonusesBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bonuses_balances');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('bonuses_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger     ('purchaser_id')            ->unsigned();
            $table->integer         ('amount')              ->default('0');
            $table->timestamps();

            $table->index('purchaser_id');

            $table->foreign('purchaser_id')->references('id')->on('users');
        });
    }
}
