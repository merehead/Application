<?php

use Illuminate\Database\Seeder;

class servicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert(['name' => 'Purchaser']);
        DB::table('user_types')->insert(['name' => 'Service user']);
        DB::table('user_types')->insert(['name' => 'Carer']);
        DB::table('user_types')->insert(['name' => 'Admin']);
        //-----------------------------------------------------------------------------
        DB::table('user_statuses')->insert(['name' => 'New']);
        DB::table('user_statuses')->insert(['name' => 'Active']);
        DB::table('user_statuses')->insert(['name' => 'Rejected']);
        DB::table('user_statuses')->insert(['name' => 'Edited']);
        DB::table('user_statuses')->insert(['name' => 'Blocked']);
        //-----------------------------------------------------------------------------
        DB::table('booking_appointment_statuses')->insert(['name' => 'new','css_name' => 'new']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'complete','css_name' => 'complete']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'in progress','css_name' => 'progress']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'canceled','css_name' => 'canceled']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'dispute','css_name' => 'dispute']);
        //-----------------------------------------------------------------------------
        DB::table('booking_appointment_frequencies')->insert(['name' => 'undefined']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'daily']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'weekly']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'monthly']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'irregular']);
    }
}
