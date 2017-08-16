<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     *
     *
     * таблица статусов аппоинтментов полученных КАК РЕЗУЛЬТАТ ответов от пользователей
     * может быть
     * 0 - new          новый аппоитмент
     * 1 - in progress  один из пользователей дал ответ
     * 2 - dispute      ответы пользователей не совпадают
     * 3 - completed    оба ответа положительны, или есть подтверждение от карера и нет ответа от сервиса, но истек таймаут
     * 4 - cancelled    оба ответа отрицательны
     * 5 - paid         аппоинтмент оплачен
     */
    public function up()
    {
        Schema::create('appointment_statuses', function (Blueprint $table) {
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
        Schema::dropIfExists('appointment_statuses');
    }
}
