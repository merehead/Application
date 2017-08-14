<?php
/**
 * Created by PhpStorm.
 * User: pc5
 * Date: 08.08.17
 * Time: 12:42
 */

namespace App\Http\Controllers\Admin\Repo\Models\Booking;


use App\Http\Controllers\Admin\Repo\Models\AdminModel;
use App\Booking;

class AdminBookings extends AdminModel
{
    public function __construct(Booking $booking) {
        $this->model = $booking;
    }
    public function viewUserList()
    {
        return;
    }

}