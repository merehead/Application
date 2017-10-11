<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mails', function (Blueprint $table) {
            $table->bigIncrements       ('id');
            $table->string              ('email', 100);
            $table->string              ('subject',100);
            $table->text                ('text');
            $table->timestamp           ('time_to_send')                                ->nullable();
            $table->timestamp           ('time_when_sent')                              ->nullable();
            $table->enum                ('status',['new','in_progress','sent']);

            $table->timestamps();

            $table->index('time_when_sent');
            $table->index('time_to_send');
            $table->index('status');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mails');
    }
}
