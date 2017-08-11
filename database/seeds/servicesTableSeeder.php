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
        DB::table('booking_appointment_statuses')->insert(['name' => 'new']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'complete']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'in progress']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'canceled']);
        DB::table('booking_appointment_statuses')->insert(['name' => 'dispute']);
        //-----------------------------------------------------------------------------
        DB::table('booking_appointment_frequencies')->insert(['name' => 'undefined']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'daily']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'weekly']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'monthly']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'irregular']);
    }
}
