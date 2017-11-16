<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Booking;
use App\DisputePayment;
use App\DisputePayout;
use App\Http\Controllers\Admin\AdminController;
use App\PayoutToPurchaser;
use App\StripeCharge;
use App\StripeConnectedAccount;
use App\StripeRefund;
use App\StripeTransfer;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use DB;
use PaymentTools;

class AdminSitePayment extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function getPayoutsToCarers() {
        $this->title = 'Admin | Booking Payouts To Carers';
        $transfers = StripeTransfer::all();
        $potentialPayouts = $this->getPotentialPayoutsForCarer();
        $this->vars['transfers'] = $transfers;
        $this->vars['potentialPayouts'] = $potentialPayouts;


        $this->content = view(config('settings.theme').'.carerPayouts.carerPayouts')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function getPayoutsToPurchasers() {
        $this->title = 'Admin | Booking Payouts To Purchasers';
        $payoutsToPurchasers = PayoutToPurchaser::all();
        $potentialPayouts = $this->getPotentialPayoutsForPurchasers();
        $this->vars['payoutsToPurchasers'] = $payoutsToPurchasers;
        $this->vars['potentialPayouts'] = $potentialPayouts;


        $this->content = view(config('settings.theme').'.purchaserPayouts.purchaserPayouts')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function getBookingTransactions(Request $request,Transaction $transaction){
        $this->title = 'Admin | Booking Transactions Management';
        $input = $request->all();
        $model = $transaction;
        $transactions = $model->select('*');
        //var_dump($input['search']);
        if(isset($input['TransactionsSort'])){
            $transactions->where('payment_method','=',$input['TransactionsSort']);
        }elseif(isset($input['search'])){
            //$transactions->with('booking')->with('bookingCarerProfile')->with('bookingPurchaserProfile')
            //->where('first_name','like',"'".$input['search']."'");
//            $transactions->orWhere('purchasers_name','like',"'".$input['search']."'");
        }elseif(isset($input['daterange'])){
            $date = explode(' - ',$input['daterange']);
            $transactions->where('created_at','<=',date('Y-m-d',strtotime($date[0])))
                ->where('created_at','>=',date('Y-m-d',strtotime($date[1])));
        }

        $transactions = $transactions->get();//->paginate(10);

        $this->vars['transactions'] = $transactions;
        $this->vars['TransactionsSort'] = $request->get('TransactionsSort',null);

        $this->content = view(config('settings.theme') . '.bookingTransactions.bookingTransactions')->with($this->vars)->render();

        return $this->renderOutput();
    }

    private function getPotentialPayoutsForPurchasers(){
        $sql = 'SELECT
                  SUM(a.price_for_purchaser) as total,  MAX(pp.id) as purchaser_id, MAX(pp.first_name) as first_name, MAX(pp.family_name) as family_name, a.booking_id
                FROM appointments a
                JOIN bookings b ON a.booking_id = b.id
                JOIN users p ON b.purchaser_id = p.id
                JOIN purchasers_profiles pp ON pp.id = p.id
                WHERE  a.payout = false AND a.status_id = 5
                GROUP BY a.booking_id';
        $res = DB::select($sql);
        return $res;
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

    public function makePayoutToPurchaser(Booking $booking){
        $sql = 'SELECT
                  SUM(a.price_for_purchaser) as total,  MAX(pp.id) as purchaser_id, MAX(pp.first_name) as first_name, MAX(pp.family_name) as family_name, a.booking_id
                FROM appointments a
                JOIN bookings b ON a.booking_id = b.id
                JOIN users p ON b.purchaser_id = p.id
                JOIN purchasers_profiles pp ON pp.id = p.id
                WHERE  a.payout = false AND pp.id = '.$booking->purchaser_id.' AND a.status_id = 5 AND a.booking_id = '.$booking->id.'
                GROUP BY a.booking_id';
        $res = DB::select($sql);
        $data = $res[0];

        $appointments = Appointment::where('booking_id', $booking->id)->where('status_id', 5)->where('payout', 0)->get();
        $appointmentsIds = implode(',', $appointments->pluck('id')->toArray());
        $comment = 'Payment to Purchaser '.$data->first_name.' '.$data->family_name.' ('.$data->purchaser_id.') for appointments '.$appointmentsIds.' in booking '.$booking->id;

        try {
            if($booking->payment_method == 'credit_card'){
                //Get stripe account of carer
                $stripeCharge = StripeCharge::where('booking_id', $booking->id)->first();
                $res = PaymentTools::createRefund($data->total*100, $stripeCharge->id, $booking->id, $comment);
            } else {
                $res = PaymentTools::createBonusRefund($data->total, $booking->id, $comment);
            }
        } catch (\Exception $ex) {
            return response($this->formatResponse('error', $ex->getMessage()));
        }

        //Mark certain appointments as with poyout
        Appointment::where('booking_id', $booking->id)
            ->where('booking_id', $booking->id)
            ->where('status_id', 5)
            ->where('payout', 0)
            ->update(['payout' => 1]);

        return response(['status' => 'success']);
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
        $appointments = Appointment::where('booking_id', $booking->id)->where('status_id', 4)->where('payout', 0)->get();
        $appointmentsIds = implode(',', $appointments->pluck('id')->toArray());

        try {
            $res = PaymentTools::createTransfer($connectedAccount->id, $booking->id, $data->total * 100, 'Payment to Carer ' . $data->first_name . ' ' . $data->family_name . ' (' . $data->carer_id . ') for appointments ' . $appointmentsIds . ' in booking ' . $booking->id);
        } catch (\Exception $ex) {
            return response($this->formatResponse('error', $ex->getMessage()));
        }
        //Mark certain appointments as with poyout
        Appointment::where('booking_id', $booking->id)->where('status_id', 4)->where('payout', 0)->update(['payout' => 1]);

        return response(['status' => 'success']);
    }
}


