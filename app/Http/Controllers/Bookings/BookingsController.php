<?php

namespace App\Http\Controllers\Bookings;

use App\Booking;
use App\BookingsMessage;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\User;
use Illuminate\Http\Request;
use SebastianBergmann\Comparator\Book;
use Auth;

class BookingsController extends FrontController
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

    public function view_details(Booking $booking){

        if(!in_array($booking->status_id, [2, 5, 7]))
            return;
        $user = Auth::user();

        $this->template = config('settings.frontTheme') . '.templates.purchaserPrivateProfile';
        $this->title = 'Booking details';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        if (!$this->user) {
            return;
        } else {
            $this->vars = array_add($this->vars, 'user', $this->user);
            $this->vars = array_add($this->vars, 'booking', $booking);
            $bookingMessage = BookingsMessage::where('booking_id', $booking->id)->orderByDesc('id')->get();
            $this->vars = array_add($this->vars, 'bookingMessage', $bookingMessage);

            $serviceUserProfile = $booking->bookingServiceUser()->first();
            $this->vars = array_add($this->vars, 'serviceUserProfile', $serviceUserProfile);


            $carerProfile = $booking->bookingCarer()->first()->userCarerProfile()->first();
            $this->vars = array_add($this->vars, 'carerProfile', $carerProfile);

            $this->content = view(config('settings.frontTheme') . '.booking.BookingDetails')->with($this->vars)->render();

        }


        return $this->renderOutput();
    }

    public function setPaymentMethod(Booking $booking, Request $request){
        dd($request);
        $booking->payment_method = $request->payment_method;
        $booking->save();

        return response(['status' => 'success']);
    }

    public function accept(Booking $booking){
        //todo take money from purchaser
        return response(['status' => 'success']);
    }

    public function reject(Booking $booking){
        $booking->status_id = 4;
        $booking->save();

        return response(['status' => 'success']);
    }

    public function cancel(Booking $booking){
        //todo cancel logic
        $booking->status_id = 4;
        $booking->save();

        return response(['status' => 'success']);
    }

    public function completed(Booking $booking){

    }

    public function create_message(Booking $booking, Request $request){
        $user = Auth::user();
        $sender  = ($user->user_type_id == 3 ? 'carer' : 'service_user');
        $BookingsMessage = BookingsMessage::create([
            'booking_id' => $booking->id,
            'sender' => $sender,
            'type' => 'message',
            'text' => $request->message,
        ]);

        return redirect()->back();
    }
}
