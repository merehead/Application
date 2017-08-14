<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Appointment;
use App\Booking;
use App\Booking_appointment_frequency;
use App\Booking_appointment_status;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\Repo\Models\Booking\AdminBookings;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;


class BookingController extends AdminController
{
    private $booking;

    public function __construct(AdminBookings $booking) {
        parent::__construct();
        $this->booking = $booking;

        $this->template = config('settings.theme').'.templates.adminBase';
    }

    public function index(Request $request)
    {

        $input = $request->all();

        $filter = FALSE;
        //$orderDirection = 'desc';
        if (isset($input['filter'])) {$input['filter'] != 0 ? $filter = ['status_id','=',$input['filter']] : $filter = FALSE;}

        $this->title = 'Admin Bookings Details';

        $bookings = $this->booking->get('*', FALSE, FALSE,  $filter, ['id','desc']);
        $this->vars = array_add($this->vars,'bookings',$bookings);

        $this->content = view(config('settings.theme').'.bookingsDetails.bookingsDetails')->with($this->vars)->render();

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
