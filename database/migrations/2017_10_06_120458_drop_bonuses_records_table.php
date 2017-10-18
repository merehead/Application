<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropBonusesRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bonuses_records');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('bonuses_records', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger     ('user_acceptor_id')     ->unsigned(); // кому пришли бонусы
            $table->bigInteger     ('user_donor_id')        ->unsigned(); // от какого реферала пришли бонусы
            $table->integer        ('amount')               ->default('0');
            $table->string         ('payment_status')       ->default('NEW');

            $table->timestamps();

            $table->index('user_acceptor_id');
            $table->index('user_donor_id');

            $table->foreign('user_acceptor_id')->references('id')->on('users');
            $table->foreign('user_donor_id')   ->references('id')->on('users');
        });
    }
}
