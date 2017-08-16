<?php

namespace App\Http\Controllers\Admin\DisputePayout;

use App\Appointment;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DisputePayoutController extends AdminController
{

    private $disputePayout;

    public function __construct(/*AdminBookings $booking*/) {
        parent::__construct();
        //$this->booking = $booking;

        $this->template = config('settings.theme').'.templates.adminBase';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->title = 'Admin Dispute Payout';

        $appointments = Appointment::where('status_id', '=', 5)
            ->orWhere('carer_status_id', '=', 5)
            ->orWhere('purchaser_status_id', '=', 5)
            ->get();
        $this->vars = array_add($this->vars,'appointments',$appointments);

        $this->content = view(config('settings.theme').'.disputePayouts.disputePayouts')->with($this->vars)->render();

        return $this->renderOutput();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
