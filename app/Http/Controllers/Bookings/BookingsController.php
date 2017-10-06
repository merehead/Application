<?php

namespace App\Http\Controllers\Bookings;

use App\Appointment;
use App\Booking;
use App\BookingOverview;
use App\BookingsMessage;
use App\CarersProfile;
use App\Http\Requests\BookingCreateRequest;
use App\Interfaces\Constants;
use App\MailError;
use App\PaymentServices\StripeService;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FrontController;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Comparator\Book;
use Auth;
use Carbon\Carbon;
use DB;
use Swift_TransportException;

class BookingsController extends FrontController implements Constants
{
    public function create(BookingCreateRequest $request){

        $booking = $this->createBooking($request);

        if($request->ajax()) // This is what i am needing.
        {
            return 'bookings/'.$booking->id.'/purchase';
        }

        return redirect('bookings/'.$booking->id.'/purchase');
    }


    public function calculateBookingPrice(BookingCreateRequest $request){

        DB::beginTransaction();

        $booking = $this->createBooking($request);
        $price = $booking->price;
        $hours = $booking->hours;

        DB::rollBack();

        return response(['price' => $price, 'hours' => $hours]);
    }

    public function update(Booking $booking, Request $request){
        //Offer alterntive time

        $user = Auth::user();

        foreach ($request->bookings as $booking_item){
            $booking->appointments()->delete();
            //Generating appointments
            $this->createAppointments($booking, $booking_item['appointments']);
        }

        if($user->user_type_id == 3){
            //carer
            $booking->carer_status_id = 1;
            $booking->purchaser_status_id = 2;
        } else{
            $booking->carer_status_id = 2;
            $booking->purchaser_status_id = 1;
        }
        
        $booking->save();

        //todo отправить почту базируясь на $user->user_type_id (либо кереру, либо пурчасеру)

        return response(['status' => 'success']);
    }

    public function getModalEditBooking(Booking $booking){

        $sql = 'SELECT  min(date_start) as date_start,  max(date_start) as date_end, min(time_from) as time_from, min(time_to) as time_to, min(periodicity) as periodicity
                FROM appointments
                WHERE booking_id = '.$booking->id.'
                GROUP BY batch ORDER BY batch';
        $appointments = DB::select($sql);
        $user = Auth::user();
       $this->vars = array_add($this->vars,'user',$user);
       $this->vars = array_add($this->vars,'appointments',$appointments);
       $this->vars = array_add($this->vars,'assistance_types',$booking->assistance_types);
       $this->vars = array_add($this->vars,'serviceUsers',$booking->bookingServiceUser);
       $this->vars = array_add($this->vars,'booking',$booking);
       $content = view(config('settings.frontTheme') . '.CarerProfiles.Booking.MessageEdit')->with($this->vars)->render();
       return  $content;
       //todo букинги тут $booking. апоинтменты тут
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

        //todo костыль на логаут
        if (!Auth::check()) {
            return \redirect('/');
            //$this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        }
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
        $booking->status_id = 2;
        $booking->save();

                    //$user=Auth::user();
            $purchaserProfile = PurchasersProfile::find($booking->purchaser_id);
            $carerProfile = CarersProfile::find($booking->carer_id);
            $serviceUser = ServiceUsersProfile::find($booking->service_user_id);
            //$user = Auth::user();
            try {
                Mail::send(config('settings.frontTheme') . '.emails.new_booking',
                    ['$purchaser' => $purchaserProfile,'booking'=>$booking,'serviceUser'=>$serviceUser,'carer'=>$carerProfile],
                    function ($m) use ($carerProfile) {
                        $m->to($carerProfile->email)->subject('New booking');
                    });
            } catch (Swift_TransportException $STe) {

                $error = MailError::create([
                    'error_message' => $STe->getMessage(),
                    'function' => __METHOD__,
                    'action' => 'Try to sent new_booking',
                    'user_id' => $carerProfile->id
                ]);
            }

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
        $booking->appointments()
            ->where('status_id', '!=', self::APPOINTMENT_STATUS_COMPLETED)
            ->update([
            'status_id' => self::APPOINTMENT_STATUS_CANCELLED,
            'carer_status_id' => self::APPOINTMENT_USER_STATUS_REJECTED,
            'purchaser_status_id' => self::APPOINTMENT_USER_STATUS_REJECTED,
            ]);
        $booking->save();

        return response(['status' => 'success']);
    }

    public function cancel(Booking $booking){
        $user = Auth::user();
        if($user->user_type_id == 3){
            //Carer
            $booking->status_id = self::CANCELLED;
            $booking->carer_status_id = self::CANCELLED;
            $booking->appointments()
                ->where('status_id', '!=', self::APPOINTMENT_STATUS_COMPLETED)
                ->update([
                    'status_id' => self::APPOINTMENT_STATUS_CANCELLED,
                    'carer_status_id' => self::APPOINTMENT_USER_STATUS_REJECTED,
                    'purchaser_status_id' => self::APPOINTMENT_USER_STATUS_REJECTED,
                ]);
            //todo Отправить мыло

            $carer = CarersProfile::find($booking->carer_id);
            $serviceUser = ServiceUsersProfile::find($booking->service_user_id);
            $purchaser = PurchasersProfile::find($booking->purchaser_id);



            try {
                Mail::send(config('settings.frontTheme') . '.emails.canceled_booking',
                    [   'user_first_name' => $purchaser->first_name,
                        'user_name' => $carer->first_name,
                        'service_user_name' => $serviceUser->first_name,
                        'address' => $serviceUser->addresss_line1,
                        'date' => 'date',
                        'time' => 'time',],
                    function ($m) use ($purchaser) {
                        $m->to($purchaser->email)->subject('Canceled booking');
                    });
            } catch (Swift_TransportException $STe) {

                $error = MailError::create([
                    'error_message' => $STe->getMessage(),
                    'function' => __METHOD__,
                    'action' => 'Try to sent Canceled booking',
                    'user_id' => $user->id
                ]);
            }
        } else {
            if($booking->carer_status_id == self::COMPLETED){
                $booking->status_id = self::DISPUTE;
                $booking->purchaser_status_id = self::CANCELLED;
            }
            //todo Отправить мыло
            $carer = CarersProfile::find($booking->carer_id);
            $serviceUser = ServiceUsersProfile::find($booking->service_user_id);
            $purchaser = PurchasersProfile::find($booking->purchaser_id);

            //dd($booking,$carer,$serviceUser,$purchaser);

            try {
                Mail::send(config('settings.frontTheme') . '.emails.canceled_booking',
                    [   'user_first_name' => $carer->first_name,
                        'user_name' => $purchaser->first_name,
                        'service_user_name' => $serviceUser->first_name,
                        'address' => $serviceUser->address_line1,
                        'date' => 'date',
                        'time' => 'time',],
                    function ($m) use ($user) {
                        $m->to($user->email)->subject('Canceled booking');
                    });
            } catch (Swift_TransportException $STe) {

                $error = MailError::create([
                    'error_message' => $STe->getMessage(),
                    'function' => __METHOD__,
                    'action' => 'Try to sent Canceled booking',
                    'user_id' => $user->id
                ]);
            }
        }

        $booking->save();

        return response(['status' => 'success']);
    }

    public function completed(Booking $booking){
        $user = Auth::user();

        if($booking->has_active_appointments)
            return response(['status' => 'error']);

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

        return redirect(url('/bookings/'.$booking->id.'/details#comments'));
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

        BookingOverview::create([
            'booking_id' => $booking->id,
            'punctuality' => $request->punctuality,
            'friendliness' => $request->friendliness,
            'communication' => $request->communication,
            'performance' => $request->performance,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }

    /**
     * @param Carbon $start_date
     * @param Carbon $end_date
     * @param int $step
     * @return array
     */
    private function generateDateRange(Carbon $start_date, Carbon $end_date, int $step = 1)
    {
        $dates = [];


        for($date = $start_date; $date->lte($end_date); $date->addDays($step)) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }

    private function createBooking(BookingCreateRequest $data) : Booking
    {
        $purchaser = Auth::user();
        $carer = User::find($data->carer_id);

        foreach ($data->bookings as $booking_item){
            //Creating booking
            $serviceUser = ServiceUsersProfile::find($data->service_user_id);
            $booking = Booking::create([
                'purchaser_id' => $purchaser->id,
                'service_user_id' => $serviceUser->id,
                'carer_id' => $carer->id,
                'status_id' => 1,
                'carer_status_id' => 2,
                'purchaser_status_id' => 1,
            ]);

            //Generating appointments
            $this->createAppointments($booking, $booking_item['appointments']);




            //Attaching booking`s assistance_types
            if(isset($booking_item['assistance_types']))
                $booking->assistance_types()->attach($booking_item['assistance_types']);

            //Booking status for workroom
            BookingsMessage::create([
                'booking_id' => $booking->id,
                'type' => 'status_change',
                'new_status' => 'pending',
            ]);



            return $booking;
        }
    }

    private function createAppointments(Booking $booking, array $appointments) : bool {
        foreach ($appointments as $batch => $appointment_item){
            isset($appointment_item['periodicity']) ? false : $appointment_item['periodicity'] = 'single';
            $days = [];
            switch (strtolower($appointment_item['periodicity'])){
                case 'daily':
                    $days = $this->generateDateRange(Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_start'])->format("Y-m-d")), Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_end'])->format("Y-m-d")));
                    break;
                case 'weekly':
                    $days = $this->generateDateRange(Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_start'])->format("Y-m-d")), Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_end'])->format("Y-m-d")), 7);
                    break;
                case 'single':
                    $days = $this->generateDateRange(Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_start'])->format("Y-m-d")), Carbon::parse(date_create_from_format('d/m/Y', $appointment_item['date_start'])->format("Y-m-d")));
                    break;
            }
            foreach ($days as $day) {
                $booking->appointments()->create([
                    'date_start' => $day,
                    'date_end' => $day,
                    'time_from' => date("H.i", strtotime($appointment_item['time_from'])),
                    'time_to' => date("H.i", strtotime($appointment_item['time_to'])),
                    'periodicity' => $appointment_item['periodicity'],
                    'status_id' => 1,
                    'carer_status_id' => 1,
                    'purchaser_status_id' => 1,
                    'batch' => $batch,
                ]);
            }
        }

        return true;
    }
}