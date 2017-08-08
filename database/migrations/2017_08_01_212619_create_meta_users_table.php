<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetaUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meta_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->default(0);
            //$table->foreign('user_id') ->references('id')->on('users') ->onDelete('cascade');

            $table->bigInteger('temp_user_id')->unsigned()->default(0);

            $table->string('meta_key')->nullable;
            $table->longText('meta_value')->nullable;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_users');
    }
}
