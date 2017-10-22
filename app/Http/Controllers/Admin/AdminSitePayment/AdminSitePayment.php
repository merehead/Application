<?php

namespace App\Http\Controllers\Admin\AdminSitePayment;

use App\Appointment;
use App\Booking;
use App\DisputePayment;
use App\Http\Controllers\Admin\AdminController;
use App\StripeConnectedAccount;
use App\StripeTransfer;
use App\Transaction;
use Illuminate\Http\Request;
use DB;
use PaymentTools;

class AdminSitePayment extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

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

    public function getPayoutsToCarers() {
        $this->title = 'Admin | Booking Payouts To Carers';
        $transfers = StripeTransfer::all();
        $potentialPayouts = $this->getPotentialPayoutsForCarer();
        $this->vars['transfers'] = $transfers;
        $this->vars['potentialPayouts'] = $potentialPayouts;


        $this->content = view(config('settings.theme') . '.carerPayouts\carerPayouts')->with($this->vars)->render();

        return $this->renderOutput();
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

    public function getBookingTransactions(Request $request){
        $this->title = 'Admin | Booking Transactions Management';

        $transactions = Transaction::all();

        $this->vars['transactions'] = $transactions;

        $this->content = view(config('settings.theme') . '.bookingTransactions.bookingTransactions')->with($this->vars)->render();

        return $this->renderOutput();
    }

    private function getPotentialPayoutsForCarer(){
        $sql = 'SELECT
                  SUM(a.price_for_carer) as total,  MAX(cp.id) as carer_id, MAX(cp.first_name) as first_name, MAX(cp.family_name) as family_name, a.booking_id
                FROM appointments a
                JOIN bookings b ON a.booking_id = b.id
                JOIN users c ON b.carer_id = c.id
                JOIN carers_profiles cp ON cp.id = c.id
                WHERE  a.payout = false AND a.status_id = 4
                GROUP BY a.booking_id';
        $res = DB::select($sql);
        return $res;
    }

    public function makePayoutToCarer(Booking $booking){
        $sql = 'SELECT
                  SUM(a.price_for_carer) as total,  MAX(cp.id) as carer_id, MAX(cp.first_name) as first_name, MAX(cp.family_name) as family_name
                FROM appointments a
                JOIN bookings b ON a.booking_id = b.id
                JOIN users c ON b.carer_id = c.id
                JOIN carers_profiles cp ON cp.id = c.id
                WHERE  a.payout = false AND cp.id = '.$booking->carer_id.' AND a.status_id = 4
                GROUP BY a.booking_id';
        $res = DB::select($sql);
        $data = $res[0];

        //Get stripe account of carer
        $connectedAccount = StripeConnectedAccount::where('carer_id', $data->carer_id)->first();

        //Transfer money to carer
        $res = PaymentTools::createTransfer($connectedAccount->id, $booking->id, $data->total*100, 'Payment to carer '.$data->carer_id.' ('.$data->first_name.' '.$data->family_name.') for booking '.$booking->id);

        //Mark certain appointments as with poyout
        Appointment::where('booking_id', $booking->id)->where('status_id', 4)->where('payout', 0)->update(['payout' => 1]);

        return response(['status' => 'success']);
    }
}


