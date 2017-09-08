<?php

use Illuminate\Database\Seeder;

class servicesTables3Seeder extends Seeder
{

    public function run()
    {
        DB::table('service_user_conditions')->insert(['name' => 'BLINDNESS / SERIOUS VISUAL IMPAIRMENT']);
        DB::table('service_user_conditions')->insert(['name' => 'DEAFNESS / SERIOUS HEARING IMPAIRMENT']);
        DB::table('service_user_conditions')->insert(['name' => 'PHYSICAL DISABILITIES WHICH REQUIRE MOBILITY AIDS']);
        DB::table('service_user_conditions')->insert(['name' => 'MENTAL / PSYCHOLOGICAL CONDITIONS']);
        DB::table('service_user_conditions')->insert(['name' => 'LONG TERM MEDICAL CONDITIONS']);


    }
}
