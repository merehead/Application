<?php

namespace App\Http\Controllers\Bookings;

use App\Booking;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use SebastianBergmann\Comparator\Book;

class BookingsController extends Controller
{
    public function create(Request $request){
        $purchaser = User::find(2);
        $carer = User::find($request->carer_id);


        if(isset($request->bookings['service_user_id']))
            $bookings[0] = $request->bookings;
        else
            $bookings = $request->bookings;


        foreach ($bookings as $booking_item){
            $serviceUser = User::find($booking_item['service_user_id']);
            $booking = Booking::create([
                'purchaser_id' => $purchaser->id,
                'service_user_id' => $serviceUser->id,
                'carer_id' => $carer->id,
                'status_id' => 2
            ]);

            $booking->assistance_types()->attach($booking_item['assistance_types']);
        }
    }

    public function setPaymentMethod(Booking $booking, Request $request){
        $booking->payment_method = $request->payment_method;
        $booking->save();

        return response(['status' => 'success']);
    }

    public function changeAppointments(Booking $booking, Request $request){
        // From create
    }
}
