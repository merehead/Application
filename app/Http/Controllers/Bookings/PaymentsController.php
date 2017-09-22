<?php

namespace App\Http\Controllers\Bookings;

use App\Booking;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\User;
use Illuminate\Http\Request;
use SebastianBergmann\Comparator\Book;

class PaymentsController extends FrontController
{
    public function payment_form(Request $request, Booking $booking){
//        if(!in_array($booking->status_id, [2, 5, 7]))
//            return;
        $this->template = config('settings.frontTheme') . '.templates.bookings';
        $this->title = 'Payment';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);

        $this->vars = array_add($this->vars, 'user', $this->user);
        $this->vars = array_add($this->vars, 'booking', $booking);

        $this->content = view(config('settings.frontTheme') . '.booking.payment_form')->with($this->vars)
            ->render();

        return $this->renderOutput();
    }

    public function create(Request $request){
        
    }
}
