<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBonusesRecordsTable extends Migration
{
    public function up()
    {
        Schema::create('bonuses_records', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger     ('user_id')            ->unsigned();
            $table->integer         ('amount')              ->default('0');
            $table->timestamps();

            $table->index('user_id');

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bonuses_records');
    }
}
