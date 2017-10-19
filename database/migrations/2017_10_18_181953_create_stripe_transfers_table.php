<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripeTransfersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripe_transfers', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('connected_account_id');
            $table->integer('amount');
            $table->timestamps();

            $table->foreign('connected_account_id')->references('id')->on('stripe_connected_accounts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stripe_transfers');
    }
}
