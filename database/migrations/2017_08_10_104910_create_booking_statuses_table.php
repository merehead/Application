<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     *
     * таблица статусов аппоинтментов полученных КАК РЕЗУЛЬТАТ ответов от пользователей
     * может быть
     * 0 - new
     * 1 - waiting confirmation
     * 2 - confirmed
     * 3 - cancelled
     * 4 - in progress  при любом движении в любом аппоинтменте
     * 5 - dispute      при диспуте в любом аппоинтменте
     * 6 - completed    все аппоинтменты completed или canceled
     * 7 - paid         все аппоинтменты оплачены
     */
    public function up()
    {
        Schema::create('booking_statuses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 64)->nullable();
            $table->string('css_name', 64)->nullable();
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
        Schema::dropIfExists('booking_statuses');
    }
}
