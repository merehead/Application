<?php

namespace App\Http\Controllers\Bookings;

use App\Appointment;
use App\Booking;
use App\BookingOverview;
use App\BookingsMessage;
use App\CarersProfile;
use App\Events\BookingCompletedEvent;
use App\Http\Requests\BookingCreateRequest;
use App\Interfaces\Constants;
use App\PaymentServices\StripeService;
use App\Http\Controllers\FrontController;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use App\User;
use App\Exceptions\MessenteException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Auth;
use Carbon\Carbon;
use PaymentTools;
use SmsTools;

class BookingsController extends FrontController implements Constants
{
    public function create(BookingCreateRequest $request)
    {
        $booking = $this->createBooking($request);

        if ($request->ajax()) // This is what i am needing.
        {
            return 'bookings/' . $booking->id . '/purchase';
        }

        return redirect('bookings/' . $booking->id . '/purchase');
    }


    public function calculateBookingPrice(BookingCreateRequest $request)
    {

        DB::beginTransaction();

        $booking = $this->createBooking($request);
        $price = $booking->price;
        $hours = $booking->hours;

        DB::rollBack();

        return response(['price' => $price, 'hours' => $hours]);
    }

    public function update(Booking $booking, Request $request)
    {
        //Offer alterntive time

        $user = Auth::user();

        foreach ($request->bookings as $booking_item) {
            $booking->appointments()->delete();
            //Generating appointments
            $this->createAppointments($booking, $booking_item['appointments']);
        }
        $sendTo = '';
        if ($user->user_type_id == 3) {
            //carer
            $booking->carer_status_id = 1;
            $booking->purchaser_status_id = 2;

        } else {
            $booking->carer_status_id = 2;
            $booking->purchaser_status_id = 1;
            $sendTo = 'carer';
        }

        $booking->save();
        // отправить почту базируясь на $user->user_type_id (либо кереру, либо пурчасеру)
        $purchaser = User::find($booking->purchaser_id);
        $carer_users = User::find($booking->carer_id);
        $purchaserProfile = PurchasersProfile::find($booking->purchaser_id);
        $carerProfile = CarersProfile::find($booking->carer_id);
        $serviceUser = ServiceUsersProfile::find($booking->service_user_id);
        $text = view(config('settings.frontTheme') . '.emails.alternative_time')->with([
            'purchaser' => $purchaserProfile, 'booking' => $booking, 'serviceUser' => $serviceUser, 'carer' => $carerProfile, 'sendTo' => $sendTo
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' => ($user->user_type_id == 3 ? $purchaser->email:$carer_users->email),
                    'subject' => 'You have a new alternative time',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);

        return response(['status' => 'success']);
    }

    public function getModalEditBooking(Booking $booking)
    {

        $sql = 'SELECT batch, min(date_start) as date_start,  max(date_start) as date_end, min(time_from) as time_from, min(time_to) as time_to, min(periodicity) as periodicity
                FROM appointments
                WHERE booking_id = ' . $booking->id . '
                GROUP BY batch ORDER BY batch';
        $appointments = DB::select($sql);

        array_map(function ($item) use ($booking) {
            $originAppointment = Appointment::where('booking_id', $booking->id)->where('batch', $item->batch)->first();
            $item->time_from = Carbon::parse($item->time_from)->format("h:i A");
            $item->time_to = Carbon::parse($item->time_to)->format("h:i A");
            $item->assistance_types = $originAppointment->assistance_types;
        }, $appointments);



        $user = Auth::user();
        $this->vars = array_add($this->vars, 'user', $user);
        $this->vars = array_add($this->vars, 'appointments', $appointments);
//        $this->vars = array_add($this->vars, 'assistance_types', $booking->assistance_types); //todo это теперь лежит внутри $appointments
        $this->vars = array_add($this->vars, 'serviceUsers', $booking->bookingServiceUser);
        $this->vars = array_add($this->vars, 'booking', $booking);
        $content = view(config('settings.frontTheme') . '.CarerProfiles.Booking.MessageEdit')->with($this->vars)->render();
        return $content;
        //todo букинги тут $booking. апоинтменты тут


        $this->vars = array_add($this->vars, 'appointments', $appointments);
        $this->vars = array_add($this->vars, 'assistance_types', $booking->assistance_types);
        $this->vars = array_add($this->vars, 'serviceUsers', $booking->bookingServiceUser);
        $this->vars = array_add($this->vars, 'booking', $booking);
        $content = view(config('settings.frontTheme') . '.CarerProfiles.Booking.MessageEdit')->with($this->vars)->render();
        return $content;
        //todo букинги тут $booking. апоинтменты тут
    }

    public function view_details(Booking $booking)
    {
        //todo костыль на логаут
        if (!Auth::check()) {
            if(request()->has('refer')){
                $cookie = Cookie::make('bookingView', request()->get('refer'),2);
                return redirect()->route('session_timeout')->withCookie($cookie);
            }
            return redirect('/');
        }

        $user = Auth::user();

        $this->template = config('settings.frontTheme') . '.templates.purchaserPrivateProfile';
        $this->title = 'Booking details';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        if (!$this->user) {
            return redirect('/');
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

    public function setPaymentMethod(Booking $booking, Request $request, StripeService $stripeService)
    {
        if ($request->payment_method == 'credit_card') {
            try {
                $cardToken = PaymentTools::createCreditCardToken([
                    'card_number' => $request->card_number,
                    'exp_month' => $request->card_month,
                    'exp_year' => $request->card_year,
                    'cvc' => $request->card_cvc,
                ]);
            } catch (\Exception $ex) {
                return response($this->formatResponse('error', $ex->getMessage()));
            }
            $booking->card_token = $cardToken;
        } else {
            if ($booking->bookingPurchaser->bonus_balance < $booking->purchaser_price) {
                return response($this->formatResponse('error', 'You do not have enough credits in your bonus wallet.'));
            }
        }

        $booking->payment_method = $request->payment_method;
        $booking->status_id = 2;
        $booking->save();

        $purchaserProfile = PurchasersProfile::find($booking->purchaser_id);
        $carerProfile = CarersProfile::find($booking->carer_id);
        $serviceUser = ServiceUsersProfile::find($booking->service_user_id);

        //message for carer
        $text = view(config('settings.frontTheme') . '.emails.new_booking')->with([
            'purchaser' => $purchaserProfile, 'booking' => $booking, 'serviceUser' => $serviceUser, 'carer' => $carerProfile, 'sendTo' => 'carer'
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' => $carerProfile->email,
                    'subject' => 'New booking on HOLM',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);

        //message for purchaser
        $text = view(config('settings.frontTheme') . '.emails.new_booking')->with([
            'purchaser' => $purchaserProfile, 'booking' => $booking, 'serviceUser' => $serviceUser, 'carer' => $carerProfile, 'sendTo' => 'purchaser'
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' => $purchaserProfile->email,
                    'subject' => 'New booking on HOLM',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);

        //sms to carer
        $message = 'Hi. ' . $booking->bookingServiceUser->full_name . ' would like to book you. Please log into your account to accept or reject the booking request. The Holm Team';
        try {

        SmsTools::sendSmsToCarer($message, $booking->bookingCarerProfile);
        }catch(MessenteException $e){
            //todo need logged
        }
        return response(['status' => 'success']);
    }

    public function accept(Booking $booking, StripeService $stripeService)
    {
        if ($booking->payment_method == 'credit_card') {
            try {
                $purchase = PaymentTools::createCharge($booking->purchaser_price * 100, $booking->card_token, $booking->id);
            } catch (\Exception $ex) {
                return response($this->formatResponse('error', $ex->getMessage()));
            }
        } else {
            try {
                PaymentTools::createBonusPayment($booking->purchaser_price, $booking->id);
            } catch (\Exception $ex) {
                return response($this->formatResponse('error', $ex->getMessage()));
            }
        }

        //Set prices for appointments
        $appointments = $booking->appointments()->get();
        foreach ($appointments as $appointment) {
            $appointment->price_for_purchaser = $appointment->purchaser_price;
            $appointment->price_for_carer = $appointment->carer_price;
            $appointment->save();
        }

        //Messages for workroom
        BookingsMessage::create([
            'booking_id' => $booking->id,
            'type' => 'status_change',
            'new_status' => 'in_progress',
        ]);

        //Set status of booking "in progress"
        $booking->status_id = $booking->carer_status_id = $booking->purchaser_status_id = self::IN_PROGRESS;
        $booking->save();

        $purchaser = User::find($booking->purchaser_id);
        $carer_users = User::find($booking->carer_id);
        $purchaserProfile = PurchasersProfile::find($booking->purchaser_id);
        $carerProfile = CarersProfile::find($booking->carer_id);
        $serviceUser = ServiceUsersProfile::find($booking->service_user_id);

        $text = view(config('settings.frontTheme') . '.emails.conform_booking')->with([
            'purchaser' => $purchaserProfile, 'booking' => $booking, 'serviceUser' => $serviceUser, 'carer' => $carerProfile, 'sendTo' => (Auth::user()->user_type_id == 3 ? 'purchaser':'carer'),
            'first_appointment_day'=>$booking->appointments()->get()->first()->date_start, 'date', 'time'
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' => (Auth::user()->user_type_id == 3 ? $purchaser->email:$carer_users->email),
                    'subject' => 'Booking confirmed',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);

        return response(['status' => 'success']);
    }

    public function reject(Booking $booking)
    {
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

        $purchaserProfile = PurchasersProfile::find($booking->purchaser_id);
        $carerProfile = CarersProfile::find($booking->carer_id);
        $serviceUser = ServiceUsersProfile::find($booking->service_user_id);

        if(Auth::user()->isCarer()){
            $user = User::find($booking->purchaser_id);
            $email =  $user->email;
            $text = view(config('settings.frontTheme') . '.emails.reject_booking')->with([
                'purchaser' => $purchaserProfile, 'booking' => $booking, 'serviceUser' => $serviceUser, 'carer' => $carerProfile, 'sendTo' => 'purchaser'
            ])->render();
        }
        if(Auth::user()->isPurchaser()){
            //message for purchaser
            $user = User::find($booking->carer_id);
            $email = $user->email;
            $text = view(config('settings.frontTheme') . '.emails.reject_booking')->with([
                'purchaser' => $purchaserProfile, 'booking' => $booking, 'serviceUser' => $serviceUser, 'carer' =>
                    $carerProfile, 'sendTo' => 'carer'
            ])->render();
        }
        DB::table('mails')
            ->insert(
                [
                    'email' => $email,
                    'subject' => 'Rejected booking on HOLM',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);

        return response(['status' => 'success']);
    }

    public function cancel(Booking $booking)
    {
        $user = Auth::user();
        if ($user->user_type_id == 3) {
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

            BookingsMessage::create([
                'booking_id' => $booking->id,
                'type' => 'status_change',
                'new_status' => 'canceled',
            ]);


            $carer = CarersProfile::find($booking->carer_id);
            $serviceUser = ServiceUsersProfile::find($booking->service_user_id);
            $purchaser = PurchasersProfile::find($booking->purchaser_id);


            $text = view(config('settings.frontTheme') . '.emails.canceled_booking')->with([
                'user_like_name' => $purchaser->like_name,
                'user_name' => $carer->first_name,
                'service_user_name' => $serviceUser->first_name,
                'address' => $serviceUser->addresss_line1,
                'date' => 'date',
                'time' => 'time',
                'booking'=>$booking,
                'sendTo' => 'purchaser'
            ])->render();

            DB::table('mails')
                ->insert(
                    [
                        'email' =>$purchaser->email,
                        'subject' =>'Canceled booking',
                        'text' =>$text,
                        'time_to_send' => Carbon::now(),
                        'status'=>'new'
                    ]);
        } else {
            if ($booking->carer_status_id == self::COMPLETED) {
                $booking->status_id = self::DISPUTE;
                $booking->purchaser_status_id = self::CANCELLED;
            } else {
                $booking->status_id = self::CANCELLED;
                $booking->purchaser_status_id = self::CANCELLED;

                $carer = CarersProfile::find($booking->carer_id);
                $serviceUser = ServiceUsersProfile::find($booking->service_user_id);
                $purchaser = PurchasersProfile::find($booking->purchaser_id);

                //dd($booking,$carer,$serviceUser,$purchaser);

                $text = view(config('settings.frontTheme') . '.emails.canceled_booking')->with([
                    'user_like_name' => $carer->like_name,
                    'user_name' => $purchaser->first_name,
                    'service_user_name' => $serviceUser->first_name,
                    'address' => $serviceUser->addresss_line1,
                    'date' => 'date',
                    'time' => 'time',
                    'booking'=>$booking,
                    'sendTo' => 'carer'
                ])->render();

                DB::table('mails')
                    ->insert(
                        [
                            'email' =>$user->email,
                            'subject' =>'Canceled booking',
                            'text' =>$text,
                            'time_to_send' => Carbon::now(),
                            'status'=>'new'
                        ]);
            }

        }

        $booking->save();

        return response(['status' => 'success']);
    }

    public function completed(Booking $booking)
    {
        $user = Auth::user();

        if ($booking->has_active_appointments)
            return response(['status' => 'error']);

        if ($user->user_type_id == 3) {
            //Carer
            $booking->carer_status_id = self::COMPLETED;
            if ($booking->purchaser_status_id == self::COMPLETED) {
                BookingsMessage::create([
                    'booking_id' => $booking->id,
                    'type' => 'status_change',
                    'new_status' => 'completed',
                ]);
                $booking->status_id = self::COMPLETED;
                event(new BookingCompletedEvent($booking));
            }

        } else {
            //Purchaser
            $booking->purchaser_status_id = self::COMPLETED;
            $booking->status_id = self::COMPLETED;
            event(new BookingCompletedEvent($booking));
            BookingsMessage::create([
                'booking_id' => $booking->id,
                'type' => 'status_change',
                'new_status' => 'completed',
            ]);
        }

        $booking->save();

        return response(['status' => 'success']);
    }

    public function create_message(Booking $booking, Request $request)
    {
        $user = Auth::user();
        $sender = ($user->user_type_id == 3 ? 'carer' : 'service_user');
        $server = ServiceUsersProfile::find($booking->service_user_id);
        $carer = CarersProfile::find($booking->carer_id);
        $purchaser = User::find($booking->purchaser_id);
        $carer_users = User::find($booking->carer_id);

        $BookingsMessage = BookingsMessage::create([
            'booking_id' => $booking->id,
            'sender' => $sender,
            'type' => 'message',
            'text' => $request->message,
        ]);


        $text = view(config('settings.frontTheme') . '.emails.new_message')->with([
            'server_users' => $server,
            'carer' => $carer,
            'booking' => $booking,
            'text' => $request->message,
            'sender' => $sender
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' => ($user->user_type_id == 3 ? $purchaser->email : $carer_users->email),
                    'subject' => 'You have a new message in your booking',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);

        return redirect(url('/bookings/' . $booking->id . '/details#comments'));
    }

    public function leaveReviewPage(Booking $booking)
    {
        $this->template = config('settings.frontTheme') . '.templates.carerPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $this->vars = array_add($this->vars, 'user', $this->user);
        $this->vars = array_add($this->vars, 'booking', $booking);

        $this->content = view(config('settings.frontTheme') . '.booking.leave_review')->with($this->vars)
            ->render();

        return $this->renderOutput();
    }

    public function createReview(Booking $booking, Request $request)
    {

        BookingOverview::create([
            'booking_id' => $booking->id,
            'punctuality' => $request->punctuality,
            'friendliness' => $request->friendliness,
            'communication' => $request->communication,
            'performance' => $request->performance,
            'comment' => $request->comment,
        ]);
        $server_users = ServiceUsersProfile::find($booking->service_user_id);
        $carer_users = CarersProfile::find($booking->carer_id);
        $text = view(config('settings.frontTheme') . '.emails.new_review')->with([
            'server_users' => $server_users,
            'carer_users' => $carer_users,
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' => 'nik@holm.care',
                    'subject' => 'You have a new review moderation',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);
        DB::table('mails')
            ->insert(
                [
                    'email' => 'z.mustafaieva@gmail.com',
                    'subject' => 'You have a new review moderation',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
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


        for ($date = $start_date; $date->lte($end_date); $date->addDays($step)) {
            $dates[] = $date->format('Y-m-d');
        }

        return $dates;
    }

    private function createBooking(BookingCreateRequest $data): Booking
    {
        $purchaser = Auth::user();
        $carer = User::find($data->carer_id);

        foreach ($data->bookings as $booking_item) {
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

            //Booking status for workroom
            BookingsMessage::create([
                'booking_id' => $booking->id,
                'type' => 'status_change',
                'new_status' => 'pending',
            ]);


            return $booking;
        }
    }

    private function createAppointments(Booking $booking, array $appointments): bool
    {
        foreach ($appointments as $batch => $appointment_item) {
            isset($appointment_item['periodicity']) ? false : $appointment_item['periodicity'] = 'single';
            $days = [];
            switch (strtolower($appointment_item['periodicity'])) {
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
                $appointment = $booking->appointments()->create([
                    'date_start' => $day,
                    'time_from' => date("H.i", strtotime($appointment_item['time_from'])),
                    'time_to' => date("H.i", strtotime($appointment_item['time_to'])),
                    'periodicity' => $appointment_item['periodicity'],
                    'status_id' => 1,
                    'carer_status_id' => 1,
                    'purchaser_status_id' => 1,
                    'batch' => $batch,
                ]);

                //Attaching booking`s assistance_types
                if (isset($appointment_item['assistance_types']))
                    $appointment->assistance_types()->attach($appointment_item['assistance_types']);
            }
        }

        return true;
    }
}