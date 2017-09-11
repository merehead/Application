<?php

namespace App\Http\Controllers\Admin\AdminSitePayment;

use App\Appointment;
use App\Bonuses_record;
use App\Booking;
use App\DisputePayment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Stripe\OAuth;
use Stripe\Stripe;
use Stripe\Token;

class AdminSitePayment extends Controller
{
    public function DisputePayoutToCarer(Request $request, $appointmentId,$userId,$amount) {

/*        $app = Appointment::find(7);

        dd($app->disputePayment);*/

        $disputePayment = DisputePayment::create(['name' => 'PAID TO CARER','css_name'=>'new','appointment_id'=>$appointmentId,'amount'=>$amount]);

        //dd($userId,$amount);


        return redirect()->back();
    }

    public function DisputePayoutToPurchaser(Request $request,$appointmentId,$userId,$amount)
    {


        $disputePayment = DisputePayment::create(['name' => 'PAID TO PURCHASER','css_name'=>'progress','appointment_id'=>$appointmentId,'amount'=>$amount]);

/*        Stripe::setApiKey('sk_test_vvAgM8jjPgxXCqBVuugYzIhg');

        $response = NULL;
        $error_response = NULL;

        $currency = 'GBP';


        $response = Token::create(
            array(
                "card" => array(
                    "number" => '5351280100032541',
                    "exp_month" => '08',
                    "exp_year" => '19',
                    "cvc" => 471,
                    "currency" => $currency
                )
            )
        );

        //dd($response);


        if ($error_response)
            return $error_response;
        else
            return $response;*/

        return redirect()->back();
    }

    public function BookingPayoutToPurchaser(Request $request, $action,$bookingId,$amount) {


        $booking = Booking::findOrFail($bookingId);

        switch ($action) {
            case 'pay' : {$actionId = 8;break;}
            case 'cancel' : {$actionId = 4;break;}
            case 'delay' : {$actionId = 9;break;}
            default : return;
        }

        $booking->status_id = $actionId;
        $booking->save();

        return redirect()->back();
    }
    public function BonusPayoutToPurchaser(Request $request, $action,$bonusRecordId,$amount) {

        $bonusRecord = Bonuses_record::findOrFail($bonusRecordId);

        switch ($action) {
            case 'pay' : {$action = 'PAID';break;}
            case 'cancel' : {$action = 'CANCELLED';break;}
            case 'delay' : {$action = 'DELAYED';break;}
            default : return;
        }

        $bonusRecord->payment_status = $action;
        $bonusRecord->save();

        return redirect()->back();
    }

    public function BookingPayoutToCarer(Request $request, $action,$bookingId,$amount) {


        $booking = Booking::findOrFail($bookingId);

        switch ($action) {
            case 'pay' : {$actionId = 8;break;}
            case 'cancel' : {$actionId = 4;break;}
            case 'delay' : {$actionId = 9;break;}
            default : return;
        }

        $booking->status_id = $actionId;
        $booking->save();

        return redirect()->back();
    }
    public function BonusPayoutToCarer(Request $request, $action,$bonusRecordId,$amount) {

        $bonusRecord = Bonuses_record::findOrFail($bonusRecordId);

        switch ($action) {
            case 'pay' : {$action = 'PAID';break;}
            case 'cancel' : {$action = 'CANCELLED';break;}
            case 'delay' : {$action = 'DELAYED';break;}
            default : return;
        }

        $bonusRecord->payment_status = $action;
        $bonusRecord->save();

        return redirect()->back();
    }

}
