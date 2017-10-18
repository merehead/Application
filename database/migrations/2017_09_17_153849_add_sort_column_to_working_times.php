<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddSortColumnToWorkingTimes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('working_times', function ($table) {
            $table->integer('sort')->nullable()->default(0);
        });
        DB::statement('UPDATE `working_times` SET `sort`=1 WHERE  `id`=2;');
        DB::statement('UPDATE `working_times` SET `sort`=2 WHERE  `id`=3;');
        DB::statement('UPDATE `working_times` SET `sort`=3 WHERE  `id`=4;');
        DB::statement('UPDATE `working_times` SET `sort`=4 WHERE  `id`=1;');
        DB::statement('UPDATE `working_times` SET `sort`=5 WHERE  `id`=5;');
        DB::statement('UPDATE `working_times` SET `sort`=6 WHERE  `id`=8;');
        DB::statement('UPDATE `working_times` SET `sort`=7 WHERE  `id`=11;');
        DB::statement('UPDATE `working_times` SET `sort`=8 WHERE  `id`=14;');
        DB::statement('UPDATE `working_times` SET `sort`=9 WHERE  `id`=17;');
        DB::statement('UPDATE `working_times` SET `sort`=10 WHERE  `id`=20;');
        DB::statement('UPDATE `working_times` SET `sort`=11 WHERE  `id`=23;');
        DB::statement('UPDATE `working_times` SET `sort`=12 WHERE  `id`=6;');
        DB::statement('UPDATE `working_times` SET `sort`=13 WHERE  `id`=9;');
        DB::statement('UPDATE `working_times` SET `sort`=14 WHERE  `id`=12;');
        DB::statement('UPDATE `working_times` SET `sort`=15 WHERE  `id`=15;');
        DB::statement('UPDATE `working_times` SET `sort`=16 WHERE  `id`=18;');
        DB::statement('UPDATE `working_times` SET `sort`=17 WHERE  `id`=21;');
        DB::statement('UPDATE `working_times` SET `sort`=18 WHERE  `id`=24;');
        DB::statement('UPDATE `working_times` SET `sort`=19 WHERE  `id`=7;');
        DB::statement('UPDATE `working_times` SET `sort`=20 WHERE  `id`=10;');
        DB::statement('UPDATE `working_times` SET `sort`=21 WHERE  `id`=13;');
        DB::statement('UPDATE `working_times` SET `sort`=22 WHERE  `id`=16;');
        DB::statement('UPDATE `working_times` SET `sort`=23 WHERE  `id`=19;');
        DB::statement('UPDATE `working_times` SET `sort`=24 WHERE  `id`=22;');
        DB::statement('UPDATE `working_times` SET `sort`=25 WHERE  `id`=25;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
