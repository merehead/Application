<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('booking_statuses')->insert(['name' => 'delayed','css_name' => 'canceled']);
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
        DB::table('working_times')->insert(['name' => 'ALL THE TIME','css_name' => 'checkboxTimer allTime']);

        DB::table('working_times')->insert(['name' => 'EVERY MORNING','css_name' => 'checkboxTimerGroup everyMorning']);
        DB::table('working_times')->insert(['name' => 'EVERY AFTERNOON','css_name' => 'checkboxTimerGroup everyAfternoon']);
        DB::table('working_times')->insert(['name' => 'EVERY NIGHT','css_name' => 'checkboxTimerGroup everyNight']);

        DB::table('working_times')->insert(['name' => 'MONDAY MORNING','css_name' => 'checkboxTimer regular morning']);
        DB::table('working_times')->insert(['name' => 'MONDAY AFTERNOON','css_name' => 'checkboxTimer regular afternoon']);
        DB::table('working_times')->insert(['name' => 'MONDAY NIGHT','css_name' => 'checkboxTimer regular night']);

        DB::table('working_times')->insert(['name' => 'TUESDAY MORNING','css_name' => 'checkboxTimer regular morning']);
        DB::table('working_times')->insert(['name' => 'TUESDAY AFTERNOON','css_name' => 'checkboxTimer regular afternoon']);
        DB::table('working_times')->insert(['name' => 'TUESDAY NIGHT','css_name' => 'checkboxTimer regular  night']);

        DB::table('working_times')->insert(['name' => 'WEDNESDAY MORNING','css_name' => 'checkboxTimer regular morning']);
        DB::table('working_times')->insert(['name' => 'WEDNESDAY AFTERNOON','css_name' => 'checkboxTimer regular  afternoon']);
        DB::table('working_times')->insert(['name' => 'WEDNESDAY NIGHT','css_name' => 'checkboxTimer regular night']);

        DB::table('working_times')->insert(['name' => 'THURSDAY MORNING','css_name' => 'checkboxTimer regular morning']);
        DB::table('working_times')->insert(['name' => 'THURSDAY AFTERNOON','css_name' => 'checkboxTimer regular  afternoon']);
        DB::table('working_times')->insert(['name' => 'THURSDAY NIGHT','css_name' => 'checkboxTimer regular  night']);

        DB::table('working_times')->insert(['name' => 'FRIDAY MORNING','css_name' => 'checkboxTimer regular morning']);
        DB::table('working_times')->insert(['name' => 'FRIDAY AFTERNOON','css_name' => 'checkboxTimer regular  afternoon']);
        DB::table('working_times')->insert(['name' => 'FRIDAY NIGHT','css_name' => 'checkboxTimer regular night']);

        DB::table('working_times')->insert(['name' => 'SATURDAY MORNING','css_name' => 'checkboxTimer regular morning']);
        DB::table('working_times')->insert(['name' => 'SATURDAY AFTERNOON','css_name' => 'checkboxTimer regular afternoon']);
        DB::table('working_times')->insert(['name' => 'SATURDAY NIGHT','css_name' => 'checkboxTimer regular night']);

        DB::table('working_times')->insert(['name' => 'SUNDAY MORNING','css_name' => 'checkboxTimer regular morning']);
        DB::table('working_times')->insert(['name' => 'SUNDAY AFTERNOON','css_name' => 'checkboxTimer regular afternoon']);
        DB::table('working_times')->insert(['name' => 'SUNDAY NIGHT','css_name' => 'checkboxTimer regular night']);
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

        DB::table('behaviours')->insert(['name' => 'None']);
        DB::table('behaviours')->insert(['name' => 'Aggression']);
        DB::table('behaviours')->insert(['name' => 'Confusion']);
        DB::table('behaviours')->insert(['name' => 'Anxiety']);
        DB::table('behaviours')->insert(['name' => 'Agitation']);
        DB::table('behaviours')->insert(['name' => 'Violence']);
        DB::table('behaviours')->insert(['name' => 'Inappropriate sexual behaviour']);
        DB::table('behaviours')->insert(['name' => 'Antisocial behaviour']);
        DB::table('behaviours')->insert(['name' => 'other']);

    }
}
