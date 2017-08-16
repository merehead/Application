<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentUserStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     *
     * таблица статусов аппоинтментов полученных как ответ от пользователей
     * может быть
     * 0 - new новый аппоитмент
     * 1 - completed завершенный
     * 2 - rejected отклоненный
     */
    public function up()
    {
        Schema::create('appointment_user_statuses', function (Blueprint $table) {
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
        Schema::dropIfExists('appointment_user_statuses');
    }
}
