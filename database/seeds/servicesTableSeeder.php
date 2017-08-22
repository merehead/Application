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
        DB::table('appointment_user_statuses')->insert(['name' => 'new','css_name' => 'new']);
        DB::table('appointment_user_statuses')->insert(['name' => 'completed','css_name' => 'complete']);
        DB::table('appointment_user_statuses')->insert(['name' => 'rejected','css_name' => 'rejected']);
        //-----------------------------------------------------------------------------
        DB::table('appointment_statuses')->insert(['name' => 'new','css_name' => 'new']);
        DB::table('appointment_statuses')->insert(['name' => 'in progress','css_name' => 'progress']);
        DB::table('appointment_statuses')->insert(['name' => 'dispute','css_name' => 'dispute']);
        DB::table('appointment_statuses')->insert(['name' => 'completed','css_name' => 'complete']);
        DB::table('appointment_statuses')->insert(['name' => 'cancelled','css_name' => 'canceled']);
        DB::table('appointment_statuses')->insert(['name' => 'paid','css_name' => 'canceled']);
        //-----------------------------------------------------------------------------
        DB::table('booking_statuses')->insert(['name' => 'new','css_name' => 'new']);
        DB::table('booking_statuses')->insert(['name' => 'awaiting confirmation','css_name' => 'canceled']);
        DB::table('booking_statuses')->insert(['name' => 'confirmed','css_name' => 'canceled']);
        DB::table('booking_statuses')->insert(['name' => 'cancelled','css_name' => 'canceled']);
        DB::table('booking_statuses')->insert(['name' => 'in progress','css_name' => 'progress']);
        DB::table('booking_statuses')->insert(['name' => 'dispute','css_name' => 'dispute']);
        DB::table('booking_statuses')->insert(['name' => 'completed','css_name' => 'complete']);
        DB::table('booking_statuses')->insert(['name' => 'paid','css_name' => 'canceled']);
        //-----------------------------------------------------------------------------
        DB::table('booking_appointment_frequencies')->insert(['name' => 'undefined']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'daily']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'weekly']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'monthly']);
        DB::table('booking_appointment_frequencies')->insert(['name' => 'irregular']);

        //-----------------------------------------------------------------------------
        DB::table('postcodes')->insert(['name' => 'BLO']);
        DB::table('postcodes')->insert(['name' => 'BL1']);
        DB::table('postcodes')->insert(['name' => 'BL2']);
        DB::table('postcodes')->insert(['name' => 'BL3']);
        DB::table('postcodes')->insert(['name' => 'BL4']);
        DB::table('postcodes')->insert(['name' => 'BL5']);
        DB::table('postcodes')->insert(['name' => 'BL6']);
        DB::table('postcodes')->insert(['name' => 'BL7']);
        DB::table('postcodes')->insert(['name' => 'BL8']);
        DB::table('postcodes')->insert(['name' => 'BL9']);
        DB::table('postcodes')->insert(['name' => 'M1']);
        DB::table('postcodes')->insert(['name' => 'M2']);
        DB::table('postcodes')->insert(['name' => 'M3']);
        DB::table('postcodes')->insert(['name' => 'M4']);
        DB::table('postcodes')->insert(['name' => 'M5']);
        DB::table('postcodes')->insert(['name' => 'M6']);
        DB::table('postcodes')->insert(['name' => 'M7']);
        DB::table('postcodes')->insert(['name' => 'M8']);
        DB::table('postcodes')->insert(['name' => 'M9']);
        DB::table('postcodes')->insert(['name' => 'M12']);
        DB::table('postcodes')->insert(['name' => 'M13']);
        DB::table('postcodes')->insert(['name' => 'M17']);
        DB::table('postcodes')->insert(['name' => 'M18']);
        DB::table('postcodes')->insert(['name' => 'M19']);
        DB::table('postcodes')->insert(['name' => 'M20']);
        DB::table('postcodes')->insert(['name' => 'M21']);
        DB::table('postcodes')->insert(['name' => 'M22']);
        DB::table('postcodes')->insert(['name' => 'M23']);
        DB::table('postcodes')->insert(['name' => 'M24']);
        DB::table('postcodes')->insert(['name' => 'M25']);
        DB::table('postcodes')->insert(['name' => 'M26']);
        DB::table('postcodes')->insert(['name' => 'M27']);
        DB::table('postcodes')->insert(['name' => 'M28']);
        DB::table('postcodes')->insert(['name' => 'M29']);
        DB::table('postcodes')->insert(['name' => 'M30']);
        DB::table('postcodes')->insert(['name' => 'M31']);
        DB::table('postcodes')->insert(['name' => 'M32']);
        DB::table('postcodes')->insert(['name' => 'M33']);
        DB::table('postcodes')->insert(['name' => 'M34']);
        DB::table('postcodes')->insert(['name' => 'M35']);
        DB::table('postcodes')->insert(['name' => 'M38']);
        DB::table('postcodes')->insert(['name' => 'M41']);
        DB::table('postcodes')->insert(['name' => 'M43']);
        DB::table('postcodes')->insert(['name' => 'M44']);
        DB::table('postcodes')->insert(['name' => 'M45']);
        DB::table('postcodes')->insert(['name' => 'M46']);
        DB::table('postcodes')->insert(['name' => 'M60']);
        DB::table('postcodes')->insert(['name' => 'OL1']);
        DB::table('postcodes')->insert(['name' => 'OL2']);
        DB::table('postcodes')->insert(['name' => 'OL3']);
        DB::table('postcodes')->insert(['name' => 'OL4']);
        DB::table('postcodes')->insert(['name' => 'OL5']);
        DB::table('postcodes')->insert(['name' => 'OL6']);
        DB::table('postcodes')->insert(['name' => 'OL7']);
        DB::table('postcodes')->insert(['name' => 'OL8']);
        DB::table('postcodes')->insert(['name' => 'OL9']);
        DB::table('postcodes')->insert(['name' => 'OL10']);
        DB::table('postcodes')->insert(['name' => 'OL1']);
        DB::table('postcodes')->insert(['name' => 'OL11']);
        DB::table('postcodes')->insert(['name' => 'OL12']);
        DB::table('postcodes')->insert(['name' => 'OL15']);
        DB::table('postcodes')->insert(['name' => 'OL16']);
        DB::table('postcodes')->insert(['name' => 'SK1']);
        DB::table('postcodes')->insert(['name' => 'SK2']);
        DB::table('postcodes')->insert(['name' => 'SK4']);
        DB::table('postcodes')->insert(['name' => 'SK5']);
        DB::table('postcodes')->insert(['name' => 'SK6']);
        DB::table('postcodes')->insert(['name' => 'SK7']);
        DB::table('postcodes')->insert(['name' => 'SK8']);
        DB::table('postcodes')->insert(['name' => 'SK14']);
        DB::table('postcodes')->insert(['name' => 'SK15']);
        DB::table('postcodes')->insert(['name' => 'SK16']);
        DB::table('postcodes')->insert(['name' => 'WA13']);
        DB::table('postcodes')->insert(['name' => 'WA14']);
        DB::table('postcodes')->insert(['name' => 'WA15']);
        DB::table('postcodes')->insert(['name' => 'WA3']);
        DB::table('postcodes')->insert(['name' => 'WN1']);
        DB::table('postcodes')->insert(['name' => 'WN2']);
        DB::table('postcodes')->insert(['name' => 'WN3']);
        DB::table('postcodes')->insert(['name' => 'WN4']);
        DB::table('postcodes')->insert(['name' => 'WN5']);
        DB::table('postcodes')->insert(['name' => 'WN6']);
        DB::table('postcodes')->insert(['name' => 'WN7']);
        //-----------------------------------------------------------------------------
        DB::table('service_types')->insert(['name' => 'SINGLE / REGULAR VISITS']);
        DB::table('service_types')->insert(['name' => 'LIVE IN CARE']);
        DB::table('service_types')->insert(['name' => 'RESPITE CARE']);
        //-----------------------------------------------------------------------------
        DB::table('assistance_types')->insert(['name' => 'PERSONAL CARE']);
        DB::table('assistance_types')->insert(['name' => 'DEMENTIA CARE']);
        DB::table('assistance_types')->insert(['name' => 'HOUSEKEEPING']);
        DB::table('assistance_types')->insert(['name' => 'FOOD / NUTRITION']);
        DB::table('assistance_types')->insert(['name' => 'DRESSINGS AND WOUND MANAGEMENT']);
        DB::table('assistance_types')->insert(['name' => 'COMPANIONSHIP']);
        DB::table('assistance_types')->insert(['name' => 'TRAVEL / VISITS / EXCURSIONS']);
        DB::table('assistance_types')->insert(['name' => 'MEDICATION / TREATMENTS']);
        DB::table('assistance_types')->insert(['name' => 'MOBILITY']);
        //-----------------------------------------------------------------------------
        DB::table('working_times')->insert(['name' => 'ALL THE TIME']);

        DB::table('working_times')->insert(['name' => 'EVERY MORNING']);
        DB::table('working_times')->insert(['name' => 'EVERY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'EVERY NIGHT']);

        DB::table('working_times')->insert(['name' => 'MONDAY MORNING']);
        DB::table('working_times')->insert(['name' => 'MONDAY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'MONDAY NIGHT']);

        DB::table('working_times')->insert(['name' => 'TUESDAY MORNING']);
        DB::table('working_times')->insert(['name' => 'TUESDAY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'TUESDAY NIGHT']);

        DB::table('working_times')->insert(['name' => 'WEDNESDAY MORNING']);
        DB::table('working_times')->insert(['name' => 'WEDNESDAY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'WEDNESDAY NIGHT']);

        DB::table('working_times')->insert(['name' => 'THURSDAY MORNING']);
        DB::table('working_times')->insert(['name' => 'THURSDAY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'THURSDAY NIGHT']);

        DB::table('working_times')->insert(['name' => 'FRIDAY MORNING']);
        DB::table('working_times')->insert(['name' => 'FRIDAY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'FRIDAY NIGHT']);

        DB::table('working_times')->insert(['name' => 'SATURDAY MORNING']);
        DB::table('working_times')->insert(['name' => 'SATURDAY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'SATURDAY NIGHT']);

        DB::table('working_times')->insert(['name' => 'SUNDAY MORNING']);
        DB::table('working_times')->insert(['name' => 'SUNDAY AFTERNOON']);
        DB::table('working_times')->insert(['name' => 'SUNDAY NIGHT']);
        //-----------------------------------------------------------------------------
        DB::table('languages')->insert(['carer_language' => 'ENGLISH']);
        DB::table('languages')->insert(['carer_language' => 'WELSH']);
        DB::table('languages')->insert(['carer_language' => 'SIGN']);
        DB::table('languages')->insert(['carer_language' => 'POLISH']);
        DB::table('languages')->insert(['carer_language' => 'URDU']);
        DB::table('languages')->insert(['carer_language' => 'HINDI']);
        DB::table('languages')->insert(['carer_language' => 'PUNJABI']);
        DB::table('languages')->insert(['carer_language' => 'BENGALI']);
        DB::table('languages')->insert(['carer_language' => 'ARABIC']);
        DB::table('languages')->insert(['carer_language' => 'MANDARIN']);
        DB::table('languages')->insert(['carer_language' => 'CANTONESE']);
        DB::table('languages')->insert(['carer_language' => 'OTHER']);
    }
}
