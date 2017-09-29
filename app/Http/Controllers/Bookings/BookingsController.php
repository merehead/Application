<?php

namespace App\Http\Controllers\Bookings;

use App\Appointment;
use App\Booking;
use App\BookingOverview;
use App\BookingsMessage;
use App\Interfaces\Constants;
use App\PaymentServices\StripeService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\User;
use Illuminate\Http\Request;
use SebastianBergmann\Comparator\Book;
use Auth;
use Carbon\Carbon;

class BookingsController extends FrontController implements Constants
{
    public function create(Request $request){

        //dd($request->all());
//        $purchaser = User::find(2);
        $purchaser = Auth::user();
        $carer = User::find($request->carer_id);


        if(isset($request->bookings['service_user_id']))
            $bookings[0] = $request->bookings;
        else
            $bookings = $request->bookings;



        foreach ($bookings as $booking_item){
            $serviceUser = User::find($request->service_user_id);
            $booking = Booking::create([
                'purchaser_id' => $purchaser->id,
                'service_user_id' => $serviceUser->id,
                'carer_id' => $carer->id,
                'status_id' => 2,
                'carer_status_id' => 2,
                'purchaser_status_id' => 1,
            ]);

            BookingsMessage::create([
                'booking_id' => $booking->id,
                'type' => 'status_change',
                'new_status' => 'pending',
            ]);

            foreach ($booking_item['appointments'] as $appointment_item){
                $days = $this->generateDateRange(Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_start'])->format("Y-m-d")), Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_end'])->format("Y-m-d")));
                foreach ($days as $day){
                    $booking->appointments()->create([
                        'date_start' => $day,
                        'date_end' => $day,
                        'time_from' => $appointment_item['time_from'],
                        'time_to' => $appointment_item['time_to'],
                        'periodicity' => $appointment_item['periodicity'],
                        'status_id' => 1,
                        'carer_status_id' => 1,
                        'purchaser_status_id' => 1,
                    ]);
                }
            }

            $booking->assistance_types()->attach($booking_item['assistance_types']);

            //отправить почту
            //todo

            return redirect('bookings/'.$booking->id.'/purchase');
        }
    }

    public function view_details(Booking $booking){

//        if(!in_array($booking->status_id, [2, 5, 7]))
//            return;
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

    public function setPaymentMethod(Booking $booking, Request $request, StripeService $stripeService){
        $booking->payment_method = $request->payment_method;

        if($request->payment_method == 'credit_card'){
            $cardToken = $stripeService->createCreditCardToken([
                'card_number' => $request->card_number,
                'exp_month' => $request->card_month,
                'exp_year' => $request->card_year,
                'cvc' => $request->card_cvc,
            ]);
            $booking->card_token = $cardToken->id;
        }
        $booking->save();

        return response(['status' => 'success']);
    }

    public function accept(Booking $booking, StripeService $stripeService){
        $user = Auth::user();
//        if($booking->status_id == 2){
        if($booking->payment_method == 'credit_card'){
            $purchase = $stripeService->createCharge([
                'amount' => $booking->carer_amount * 100,
            ], $booking->card_token);
//                dd($purchase);
        }
        else{

        }
        BookingsMessage::create([
            'booking_id' => $booking->id,
            'type' => 'status_change',
            'new_status' => 'in_progress',
        ]);
        $booking->status_id = $booking->carer_status_id = $booking->purchaser_status_id = self::IN_PROGRESS;
        $booking->save();
//        }

        return response(['status' => 'success']);
    }

    public function reject(Booking $booking){
        $booking->status_id = self::CANCELLED;
        $booking->carer_status_id = self::CANCELLED;
        $booking->purchaser_status_id = self::CANCELLED;
        $booking->save();

        return response(['status' => 'success']);
    }

    public function cancel(Booking $booking){
        $user = Auth::user();
        if($user->user_type_id == 3){
            //Carer
            $booking->status_id = self::CANCELLED;
            $booking->carer_status_id = self::CANCELLED;
        } else {
            if($booking->carer_status_id == self::COMPLETED){
                $booking->status_id = self::DISPUTE;
                $booking->purchaser_status_id = self::CANCELLED;
            }
        }

        $booking->save();

        return response(['status' => 'success']);
    }

    public function completed(Booking $booking){
        $user = Auth::user();
        if($user->user_type_id == 3){
            //Carer
            $booking->carer_status_id = self::COMPLETED;
            if($booking->purchaser_status_id == self::COMPLETED){
                BookingsMessage::create([
                    'booking_id' => $booking->id,
                    'type' => 'status_change',
                    'new_status' => 'completed',
                ]);
                $booking->status_id = self::COMPLETED;
            }
            
        } else {
            //Purchaser
            $booking->purchaser_status_id = self::COMPLETED;
            $booking->status_id = self::COMPLETED;
            BookingsMessage::create([
                'booking_id' => $booking->id,
                'type' => 'status_change',
                'new_status' => 'completed',
            ]);
        }

        $booking->save();

        return response(['status' => 'success']);
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

    public function leaveReviewPage(Booking $booking){
        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->vars = array_add($this->vars, 'user', $this->user);
        $this->vars = array_add($this->vars, 'booking', $booking);

        $this->content = view(config('settings.frontTheme') . '.booking.leave_review')->with($this->vars)
            ->render();

        return $this->renderOutput();
    }

    public function createReview(Booking $booking, Request $request){
        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        BookingOverview::create([
            'booking_id' => $booking->id,
            'punctuality' => $request->punctuality,
            'friendliness' => $request->friendliness,
            'communication' => $request->communication,
            'performance' => $request->performance,
            'comment' => $request->comment,
        ]);

        $this->content = view(config('settings.frontTheme') . '.booking.leave_review_thx')->with($this->vars)
            ->render();

        return $this->renderOutput();
    }

    private function generateDateRange(Carbon $start_date, Carbon $end_date)
    {
        $dates = [];

        for($date = $start_date; $date->lte($end_date); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }
}