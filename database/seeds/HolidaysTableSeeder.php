<?php

use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {








        DB::table('holidays')->insert(
            [
            'name' => 'New Year’s Day',
            'date' => date('Y-m-d',strtotime('2017-01-01')),
        ]);
        DB::table('holidays')->insert(
            [
            'name' => 'Good Friday',
            'date' => date('Y-m-d',strtotime('2017-03-30')),
        ]);
        DB::table('holidays')->insert(
            [
            'name' => 'Easter Monday',
            'date' => date('Y-m-d',strtotime('2017-04-02')),
        ]);
        DB::table('holidays')->insert(
            [
            'name' => 'Early May bank holiday',
            'date' => date('Y-m-d',strtotime('2017-05-28')),
        ]);
        DB::table('holidays')->insert(
            [
            'name' => 'Spring bank holiday',
            'date' => date('Y-m-d',strtotime('2017-08-07')),
        ]);
        DB::table('holidays')->insert(
            [
            'name' => 'Summer bank holiday',
            'date' => date('Y-m-d',strtotime('2017-08-27')),
        ]);
        DB::table('holidays')->insert(
            [
            'name' => 'Christmas Day',
            'date' => date('Y-m-d',strtotime('2017-12-25')),
        ]);
        DB::table('holidays')->insert(
            [
            'name' => 'Boxing Day',
            'date' => date('Y-m-d',strtotime('2017-12-26')),
        ]);
    }
}
