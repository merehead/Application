<?php

namespace App\Http\Controllers\Admin\AdminSitePayment;

use App\Appointment;
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
}
