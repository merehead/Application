<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\DisputePayout;
use App\Http\Controllers\Admin\AdminController;
use App\StripeCharge;
use App\StripeConnectedAccount;
use Illuminate\Http\Request;
use PaymentTools;


class DisputePayoutsController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index() {
        $this->vars['disputePayouts'] = DisputePayout::all();
        $this->content = view(config('settings.theme').'.disputePayouts.disputePayouts')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function setDetailsOfDispute(Request $request) {
        $disputePayout = DisputePayout::find($request->dispute_payout_id);
        $disputePayout->details_of_dispute = $request->details_of_dispute;
        $disputePayout->save();
    }

    public function detailsOfDisputeResolution(Request $request) {
        $disputePayout = DisputePayout::find($request->dispute_payout_id);
        $disputePayout->details_of_dispute_resolution = $request->details_of_dispute_resolution;
        $disputePayout->save();
    }

    public function payoutToCarer(Request $request){
        $disputePayout = DisputePayout::find($request->dispute_payout_id);
        $appointment = $disputePayout->appointment;
        $booking = $appointment->booking;
        $stripeConnectedAccount = StripeConnectedAccount::where('carer_id', $booking->carer_id)->first();
        $comment = 'Payment to Carer '.$booking->bookingCarerProfile->full_name.' ('.$booking->carer_id.') for appointment '.$appointment->id.' in booking '.$booking->id.' (dispute resolving)';
        try {
            $res = PaymentTools::createTransfer($stripeConnectedAccount->id, $booking->id, $appointment->price_for_carer*100, $comment);
        } catch (\Exception $ex) {
            return response($this->formatResponse('error', $ex->getMessage()));
        }
        $disputePayout->status = 'carer';
        $disputePayout->save();

        $appointment->payout = true;
        $appointment->save();

        return response(['status' => 'success']);
    }

    public function payoutToPurchaser(Request $request){
        $disputePayout = DisputePayout::find($request->dispute_payout_id);
        $appointment = $disputePayout->appointment;
        $booking = $appointment->booking;

        $comment = 'Payment to Purchaser '.$booking->bookingCarerProfile->full_name.' ('.$booking->carer_id.') for appointment '.$appointment->id.' in booking '.$booking->id.' (dispute resolving)';

        try {
            if($booking->payment_method == 'credit_card'){
                //Get stripe account of carer
                $stripeCharge = StripeCharge::where('booking_id', $booking->id)->first();

                //Transfer money to carer
                $res = PaymentTools::createRefund($appointment->price_for_purchaser*100, $stripeCharge->id, $booking->id, $comment);
            } else {
                $res = PaymentTools::createBonusRefund($appointment->price_for_purchaser, $booking->id, $comment);
            }
        } catch (\Exception $ex) {
            return response($this->formatResponse('error', $ex->getMessage()));
        }

        $disputePayout->status = 'purchaser';
        $disputePayout->save();

        $appointment->payout = true;
        $appointment->save();

        return response(['status' => 'success']);
    }
}
