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
        DB::table('transactions')->insert(['name' => 'tran1']);
        DB::table('transactions')->insert(['name' => 'tran2']);
        DB::table('transactions')->insert(['name' => 'tran3']);
        //-----------------------------------------------------------------------------
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'1','amount'=>'1113','status_id'=>'1','carer_status_id'=>'1','purchaser_status_id'=>'5']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'1','amount'=>'1113','status_id'=>'5','carer_status_id'=>'2','purchaser_status_id'=>'4']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'5','amount'=>'1113','status_id'=>'3','carer_status_id'=>'3','purchaser_status_id'=>'3']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'3','amount'=>'1113','status_id'=>'2','carer_status_id'=>'4','purchaser_status_id'=>'2']);
        DB::table('bookings')->insert(['purchaser_id' => '1','service_user_id' => '1','carer_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','frequency_id'=>'4','amount'=>'1113','status_id'=>'4','carer_status_id'=>'5','purchaser_status_id'=>'1']);
        //-----------------------------------------------------------------------------
        DB::table('appointments')->insert(['booking_id' => '1','transaction_id' => '1','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount'=>'1113','status_id'=>'1','carer_status_id'=>'3','purchaser_status_id'=>'5']);
        DB::table('appointments')->insert(['booking_id' => '2','transaction_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount'=>'1113','status_id'=>'2','carer_status_id'=>'4','purchaser_status_id'=>'1']);
        DB::table('appointments')->insert(['booking_id' => '3','transaction_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount'=>'1113','status_id'=>'3','carer_status_id'=>'5','purchaser_status_id'=>'2']);
        DB::table('appointments')->insert(['booking_id' => '3','transaction_id' => '2','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount'=>'1113','status_id'=>'4','carer_status_id'=>'1','purchaser_status_id'=>'3']);
        DB::table('appointments')->insert(['booking_id' => '4','transaction_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount'=>'1113','status_id'=>'5','carer_status_id'=>'2','purchaser_status_id'=>'4']);
        DB::table('appointments')->insert(['booking_id' => '4','transaction_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount'=>'1113','status_id'=>'1','carer_status_id'=>'3','purchaser_status_id'=>'5']);
        DB::table('appointments')->insert(['booking_id' => '4','transaction_id' => '3','date_start' => '2017-08-01 00:00:00','date_end' => '2017-08-10 00:00:00','amount'=>'1113','status_id'=>'2','carer_status_id'=>'4','purchaser_status_id'=>'1']);
    }
}
