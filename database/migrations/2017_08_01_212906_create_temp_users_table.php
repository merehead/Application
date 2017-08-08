<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_users', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('user_id')->unsigned()->default(0);
            //$table->foreign('user_id') ->references('id')->on('users') ->onDelete('cascade');

            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('fname', 100)->nullable();
            $table->string('lname', 100)->nullable();
            $table->string('nicename', 100)->nullable();
            $table->string('gender', 2)->nullable();
            $table->string('remember_step')->nullable();
            $table->string('token_step')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('temp_users');
    }
}
