<?php

use Illuminate\Database\Seeder;

class servicesTables4Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('floors')->insert(['name' => 'Ground']);
        DB::table('floors')->insert(['name' => '1']);
        DB::table('floors')->insert(['name' => '2']);
        DB::table('floors')->insert(['name' => '3']);
        DB::table('floors')->insert(['name' => '4']);
        DB::table('floors')->insert(['name' => '5']);
        DB::table('floors')->insert(['name' => '6']);
        DB::table('floors')->insert(['name' => '7']);
        DB::table('floors')->insert(['name' => '8']);
        DB::table('floors')->insert(['name' => '9']);
        DB::table('floors')->insert(['name' => '10']);
        DB::table('floors')->insert(['name' => '11']);
        DB::table('floors')->insert(['name' => '12']);
        DB::table('floors')->insert(['name' => '13']);
        DB::table('floors')->insert(['name' => '14']);
        DB::table('floors')->insert(['name' => '15']);
        DB::table('floors')->insert(['name' => '16']);
        DB::table('floors')->insert(['name' => '17']);
        DB::table('floors')->insert(['name' => '18']);
        DB::table('floors')->insert(['name' => '19']);
        DB::table('floors')->insert(['name' => '20']);
        DB::table('floors')->insert(['name' => '21']);
        DB::table('floors')->insert(['name' => '22']);
        DB::table('floors')->insert(['name' => '23']);
        DB::table('floors')->insert(['name' => '24']);
        DB::table('floors')->insert(['name' => '25']);
        DB::table('floors')->insert(['name' => '26']);
        DB::table('floors')->insert(['name' => '27']);
        DB::table('floors')->insert(['name' => '28']);
        DB::table('floors')->insert(['name' => '29']);
        DB::table('floors')->insert(['name' => '30']);

        DB::table('service_user_conditions')->insert(['name' => 'BLINDNESS / SERIOUS VISUAL IMPAIRMENT']);
        DB::table('service_user_conditions')->insert(['name' => 'DEAFNESS / SERIOUS HEARING IMPAIRMENT']);
        DB::table('service_user_conditions')->insert(['name' => 'PHYSICAL DISABILITIES WHICH REQUIRE MOBILITY AIDS']);
        DB::table('service_user_conditions')->insert(['name' => 'MENTAL / PSYCHOLOGICAL CONDITIONS']);
        DB::table('service_user_conditions')->insert(['name' => 'LONG TERM MEDICAL CONDITIONS']);

    }
}