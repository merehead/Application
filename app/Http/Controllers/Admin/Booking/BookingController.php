<?php

namespace App\Http\Controllers\Admin\Booking;


use App\BookingStatus;
use App\Booking;
use App\User;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Admin\Repo\Models\Booking\AdminBookings;

use Illuminate\Http\Request;


class BookingController extends AdminController
{
    private $booking;

    public function __construct(AdminBookings $booking)
    {
        parent::__construct();
        $this->booking = $booking;

        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(Request $request)
    {

        $input = $request->all();

        $filter = FALSE;
        //$orderDirection = 'desc';

        if (isset($input['filter']) && $input['filter'] != 0)
            $filter_status = $input['filter']; else $filter_status = FALSE;
        
        if (isset($input['userName'])) $filter = ['first_name', '=', $input['userName']]; else $filter = FALSE;

        $this->title = 'Admin Bookings Details';

//        $bookings = $this->booking->get('*', FALSE, true,  $filter, ['id','desc']);
        $bookings = Booking::with('bookingServiceUser')->with('bookingCarerProfile')->with('bookingPurchaserProfile')->get();

        $userName = (isset($input['userName'])) ? $input['userName'] : false;
        if (!empty($userName))
            $bookings = $bookings->filter(function ($item) use ($userName) {

                if (strpos(strtolower($item->bookingServiceUser->first_name), strtolower($userName)) !== false
                    || strpos(strtolower($item->bookingCarerProfile->first_name), strtolower($userName)) !== false
                    || strpos(strtolower($item->bookingPurchaserProfile->first_name), strtolower($userName)) !== false)
                    return true;
            });

        if ($filter_status !== FALSE) {
            $bookings = $bookings->filter(function ($item) use ($filter_status) {

                if ($item->status_id == $filter_status)
                    return true;
            });
        }


        $page = $request->get('page', 1);
        $perPage = 9;
        $start = ($page - 1) * $perPage;
        if ($page == 1) $start = 0;
        $count = count($bookings);
        if ($count > 0)
            $pages = ceil($count / $perPage);
        else
            $pages = 0;
        $nextPage = $page + 1;
        $previousPage = $page - 1;
        // --------- pagination -----------
        $bookings = $bookings->slice($start, $perPage);
        $this->vars = array_add($this->vars, 'nextPage', $nextPage);
        $this->vars = array_add($this->vars, 'previousPage', $previousPage);
        $this->vars = array_add($this->vars, 'count', $count);
        $this->vars = array_add($this->vars, 'curr_page', $page);
        $this->vars = array_add($this->vars, 'pages', $pages);

        $this->vars = array_add($this->vars, 'link', '/admin/booking');
        $query = $request->all();
        if(key_exists('page',$query)) unset($query['page']);
        $this->vars = array_add($this->vars, 'queryString', $query);
        $pagination = view(config('settings.theme') . '.pagination2')->with($this->vars)->render();
        $this->vars = array_add($this->vars, 'pagination', $pagination);
        // --------------------------------
        $this->vars = array_add($this->vars, 'bookings', $bookings);

        $bookingStatuses = BookingStatus::all()->pluck('name', 'id')->toArray();
        $this->vars = array_add($this->vars, 'bookingStatuses', $bookingStatuses);

        $this->content = view(config('settings.theme') . '.bookingsDetails.bookingsDetails')->with($this->vars)->render();

        return $this->renderOutput();
    }
}
