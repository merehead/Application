<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('referral_code')->nullable();
            $table->integer     ('user_type_id')            ->unsigned();
            $table->rememberToken();
            $table->timestamps();

            $table->index('user_type_id');

            $table->foreign('user_type_id')         ->references('id')->on('user_types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
