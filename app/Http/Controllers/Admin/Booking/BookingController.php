<?php

namespace App\Http\Controllers\Admin\Booking;


use App\BookingStatus;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\Repo\Models\Booking\AdminBookings;

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

        $bookingStatuses = BookingStatus::all()->pluck('name','id')->toArray();
        $this->vars = array_add($this->vars,'bookingStatuses',$bookingStatuses);

        $this->content = view(config('settings.theme').'.bookingsDetails.bookingsDetails')->with($this->vars)->render();

        return $this->renderOutput();
    }
}
