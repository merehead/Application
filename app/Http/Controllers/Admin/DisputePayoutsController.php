<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\DisputePayout;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;


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
}
