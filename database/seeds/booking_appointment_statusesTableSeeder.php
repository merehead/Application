<?php

use Illuminate\Database\Seeder;

class booking_appointment_statusesTableSeeder extends Seeder
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
    }
}
