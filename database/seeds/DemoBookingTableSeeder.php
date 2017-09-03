<?php

use Illuminate\Database\Seeder;

class DemoBookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['email' => 'u1@loc.loc','password' => 'u1@loc.loc','user_type_id'=>2]);
        DB::table('users')->insert(['email' => 'u2@loc.loc','password' => 'u1@loc.loc','user_type_id'=>3]);
        DB::table('users')->insert(['email' => 'u3@loc.loc','password' => 'u1@loc.loc','user_type_id'=>4]);
        //--------------------------
        DB::table('transactions')->insert(['name' => 'tran1']);
        DB::table('transactions')->insert(['name' => 'tran2']);
        DB::table('transactions')->insert(['name' => 'tran3']);
        //-----------------------------------------------------------------------------
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'1','amount_for_purchaser'=>'1113','amount_for_carer'=>'888','status_id'=>'1']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'1','amount_for_purchaser'=>'1113','amount_for_carer'=>'999','status_id'=>'5']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'5','amount_for_purchaser'=>'1113','amount_for_carer'=>'555','status_id'=>'3']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'3','amount_for_purchaser'=>'1113','amount_for_carer'=>'666','status_id'=>'2']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'4','amount_for_purchaser'=>'1113','amount_for_carer'=>'777','status_id'=>'4']);
        //-----------------------------------------------------------------------------
        //пример набора аппоинтментов со всеми статусами для букинга 1
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'12','amount_for_carer'=>'13','status_id'=>'2','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'2','carer_status_id'=>'1','purchaser_status_id'=>'3']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'11','status_id'=>'3','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'3','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'14','amount_for_carer'=>'11','status_id'=>'5','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'16','amount_for_carer'=>'10','status_id'=>'4','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'18','amount_for_carer'=>'11','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);

        //пример набора аппоинтментов со всеми статусами для букинга 2
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'12','amount_for_carer'=>'13','status_id'=>'2','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'2','carer_status_id'=>'1','purchaser_status_id'=>'3']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'11','status_id'=>'3','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'3','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'14','amount_for_carer'=>'11','status_id'=>'5','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'16','amount_for_carer'=>'10','status_id'=>'4','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'18','amount_for_carer'=>'11','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);

        //пример набора аппоинтментов со всеми статусами для букинга 3
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'12','amount_for_carer'=>'13','status_id'=>'2','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'2','carer_status_id'=>'1','purchaser_status_id'=>'3']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'11','status_id'=>'3','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'3','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'14','amount_for_carer'=>'11','status_id'=>'5','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'16','amount_for_carer'=>'10','status_id'=>'4','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'18','amount_for_carer'=>'11','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);
        //пример набора аппоинтментов со всеми статусами для букинга 4
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'12','amount_for_carer'=>'13','status_id'=>'2','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'2','carer_status_id'=>'1','purchaser_status_id'=>'3']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'11','status_id'=>'3','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'3','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'14','amount_for_carer'=>'11','status_id'=>'5','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'16','amount_for_carer'=>'10','status_id'=>'4','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'18','amount_for_carer'=>'11','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '4','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);

        //пример набора аппоинтментов со всеми статусами для букинга 5
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'6','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'12','amount_for_carer'=>'13','status_id'=>'2','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'2','carer_status_id'=>'1','purchaser_status_id'=>'3']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'15','amount_for_carer'=>'11','status_id'=>'3','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'13','amount_for_carer'=>'10','status_id'=>'3','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'14','amount_for_carer'=>'11','status_id'=>'5','carer_status_id'=>'3','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'3','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'16','amount_for_carer'=>'10','status_id'=>'4','carer_status_id'=>'2','carer_status_date'=>'2017-08-10 00:00:00','purchaser_status_id'=>'2','purchaser_status_date'=>'2017-08-10 00:00:00']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'18','amount_for_carer'=>'11','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '5','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount_for_purchaser'=>'11','amount_for_carer'=>'10','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'1']);

        //-----------------------------------------------------------------------------
        DB::table('booking_payments')->insert(['booking_id' => '1','purchaser_id' => '1','transaction_id' => 'ch_1Ar41R2eZvKYlo2CnJudEU2Q','amount' => '1200','created' => '2017-08-10 00:00:00','description' => 'first  book']);
        DB::table('booking_payments')->insert(['booking_id' => '2','purchaser_id' => '1','transaction_id' => 'ch_2Ar41R2eZvKYlo2CnJudEU2Q','amount' => '2400','created' => '2017-08-10 00:00:00','description' => 'second book']);
        DB::table('booking_payments')->insert(['booking_id' => '3','purchaser_id' => '1','transaction_id' => 'ch_3Ar41R2eZvKYlo2CnJudEU2Q','amount' => '3300','created' => '2017-08-10 00:00:00','description' => 'third  book']);
        DB::table('booking_payments')->insert(['booking_id' => '4','purchaser_id' => '1','transaction_id' => 'ch_4Ar41R2eZvKYlo2CnJudEU2Q','amount' => '4900','created' => '2017-08-10 00:00:00','description' => 'fourth book']);
        //-----------------------------------------------------------------------------
        DB::table('appointment_payments')->insert(['appointment_id' => '1','carer_id' => '2','transaction_id' => 'tr_1Ar41R2eZvKYlo2CnJudEU2Q','amount' => '1200','created' => '2017-08-10 00:00:00','description' => 'first  app']);
        DB::table('appointment_payments')->insert(['appointment_id' => '2','carer_id' => '4','transaction_id' => 'tr_2Ar41R2eZvKYlo2CnJudEU2Q','amount' => '2400','created' => '2017-08-10 00:00:00','description' => 'second app']);
        DB::table('appointment_payments')->insert(['appointment_id' => '3','carer_id' => '4','transaction_id' => 'tr_3Ar41R2eZvKYlo2CnJudEU2Q','amount' => '3300','created' => '2017-08-10 00:00:00','description' => 'third  app']);
        DB::table('appointment_payments')->insert(['appointment_id' => '4','carer_id' => '2','transaction_id' => 'tr_4Ar41R2eZvKYlo2CnJudEU2Q','amount' => '4900','created' => '2017-08-10 00:00:00','description' => 'fourth app']);
        DB::table('appointment_payments')->insert(['appointment_id' => '5','carer_id' => '2','transaction_id' => 'tr_4Ar41R2eZvKYlo2CnJudEU2Q','amount' => '4900','created' => '2017-08-10 00:00:00','description' => 'fifth app']);
        //-----------------------------------------------------------------------------
        DB::table('bonuses_records')->insert(['user_id' => '1','amount' => '120']);
        DB::table('bonuses_records')->insert(['user_id' => '2','amount' => '100']);
        DB::table('bonuses_records')->insert(['user_id' => '1','amount' => '120']);
        //-----------------------------------------------------------------------------
        DB::table('bonuses_balances')->insert(['purchaser_id' => '1','amount' => '40']);
        //-----------------------------------------------------------------------------



    }
}
