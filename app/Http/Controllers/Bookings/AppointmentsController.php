<?php

namespace App\Http\Controllers\Bookings;
use App\Appointment;
use App\Booking;
use App\CarersProfile;
use App\DisputePayout;
use App\Events\AppointmentCompletedEvent;
use App\Http\Controllers\Controller;
use App\Interfaces\Constants;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use App\User;
use Auth;
use SmsTools;
use DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class AppointmentsController extends Controller implements Constants
{
    public function reject(Appointment $appointment){
        $user = Auth::user();
        $booking = $appointment->booking;

        //$email = $user->email;// ALEXX (продублировать для кэнсел)
        $receiver = DB::table('bookings')
            ->leftJoin('users', 'users.id', '=', 'bookings.purchaser_id')
            ->where('bookings.id', $booking->id)
            ->get();
        $email = $receiver[0]->email;

        $purchaserProfile = PurchasersProfile::find($booking->purchaser_id);
        $carerProfile = CarersProfile::find($booking->carer_id);
        $serviceUser = ServiceUsersProfile::find($booking->service_user_id);

        if($user->user_type_id == 3){
            //If Carer
            $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
            if(!$appointment->cancelable)
                $appointment->carer_status_id =  self::APPOINTMENT_USER_STATUS_REJECTED;
            $message = 'Sorry. '.$appointment->booking->bookingCarerProfile->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
            SmsTools::sendSmsToServiceUser($message, $appointment->booking->bookingServiceUser);

            $message = 'Sorry. '.$appointment->booking->bookingCarerProfile->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
            SmsTools::sendSmsToPurchaser($message, $appointment->booking->bookingPurchaserProfile);


            $text = view(config('settings.frontTheme') . '.emails.appointment_rejected')->with([
                'purchaser' => $purchaserProfile, 'booking' => $booking, 'appointment' => $appointment, 'serviceUser' => $serviceUser, 'carer' =>
                    $carerProfile, 'sendTo' => 'purchaser', 'user_like_name' => $purchaserProfile->like_name, 'user_name' => 'user_name'
            ])->render();

            DB::table('mails')
                ->insert(
                    [
                        'email' => $email,
                        'subject' => 'Rejecting appointment on HOLM',
                        'text' => $text,
                        'time_to_send' => Carbon::now(),
                        'status' => 'new'
                    ]);

        } else {
            //Purchaser
            if($appointment->cancelable){
                $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
                $message = 'Sorry. '.$appointment->booking->bookingServiceUser->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
                SmsTools::sendSmsToCarer($message, $appointment->booking->bookingCarerProfile);
            } elseif($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_NEW){
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
                $message = 'Sorry. '.$appointment->booking->bookingServiceUser->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
                SmsTools::sendSmsToCarer($message, $appointment->booking->bookingCarerProfile);
            } elseif($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_COMPLETED) {
                $appointment->status_id = self::APPOINTMENT_STATUS_DISPUTE;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
                DisputePayout::create([
                    'appointment_id' => $appointment->id,
                ]);
            } elseif ($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_REJECTED){
                $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
                $message = 'Sorry. '.$appointment->booking->bookingServiceUser->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
                SmsTools::sendSmsToCarer($message, $appointment->booking->bookingCarerProfile);
            }
        }

        /* ALEXX - задубленное?
        $text = view(config('settings.frontTheme') . '.emails.appointment_cancelled')->with([
            'purchaser' => $purchaserProfile, 'booking' => $booking, 'appointment' => $appointment, 'serviceUser' => $serviceUser, 'carer' =>
                $carerProfile, 'sendTo' => 'carer', 'user_like_name' => $carerProfile->full_name
        ])->render();
        DB::table('mails')
            ->insert(
                [
                    'email' => $email,
                    'subject' => 'Cancelling appointment on HOLM',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);
        */
        $appointment->save();

        return response(['status' => 'success']);
    }

    public function cancelled(Appointment $appointment){
        $user = Auth::user();
        $booking = $appointment->booking;

        //$email = $user->email;//ALEXX

        $receiver = DB::table('bookings')
            ->leftJoin('users', 'users.id', '=', 'bookings.purchaser_id')
            ->where('bookings.id', $booking->id)
            ->get();
        $email = $receiver[0]->email;

        $purchaserProfile = PurchasersProfile::find($booking->purchaser_id);
        $carerProfile = CarersProfile::find($booking->carer_id);
        $serviceUser = ServiceUsersProfile::find($booking->service_user_id);

        if($user->user_type_id == 3){
            //If Carer
            $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
            if(!$appointment->cancelable)
                $appointment->carer_status_id =  self::APPOINTMENT_USER_STATUS_REJECTED;
            $message = 'Sorry. '.$appointment->booking->bookingCarerProfile->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
            SmsTools::sendSmsToServiceUser($message, $appointment->booking->bookingServiceUser);

            $message = 'Sorry. '.$appointment->booking->bookingCarerProfile->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
            SmsTools::sendSmsToPurchaser($message, $appointment->booking->bookingPurchaserProfile);


            $text = view(config('settings.frontTheme') . '.emails.appointment_cancelled')->with([
                'purchaser' => $purchaserProfile, 'booking' => $booking, 'appointment' => $appointment, 'serviceUser' => $serviceUser, 'carer' =>
                    $carerProfile, 'sendTo' => 'purchaser', 'user_like_name' => $purchaserProfile->like_name, 'user_name' => 'user_name'
            ])->render();

            DB::table('mails')
                ->insert(
                    [
                        'email' => $email,
                        'subject' => 'Cancelling appointment on HOLM',
                        'text' => $text,
                        'time_to_send' => Carbon::now(),
                        'status' => 'new'
                    ]);

        } else {
            //Purchaser
            if($appointment->cancelable){
                $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
                $message = 'Sorry. '.$appointment->booking->bookingServiceUser->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
                SmsTools::sendSmsToCarer($message, $appointment->booking->bookingCarerProfile);
            } elseif($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_NEW){
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
                $message = 'Sorry. '.$appointment->booking->bookingServiceUser->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
                SmsTools::sendSmsToCarer($message, $appointment->booking->bookingCarerProfile);
            } elseif($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_COMPLETED) {
                $appointment->status_id = self::APPOINTMENT_STATUS_DISPUTE;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
                DisputePayout::create([
                    'appointment_id' => $appointment->id,
                ]);
            } elseif ($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_REJECTED){
                $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
                $message = 'Sorry. '.$appointment->booking->bookingServiceUser->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
                SmsTools::sendSmsToCarer($message, $appointment->booking->bookingCarerProfile);
            }
        }

        /* ALEXX - задубленное?
        $text = view(config('settings.frontTheme') . '.emails.appointment_cancelled')->with([
            'purchaser' => $purchaserProfile, 'booking' => $booking, 'appointment' => $appointment, 'serviceUser' => $serviceUser, 'carer' =>
                $carerProfile, 'sendTo' => 'carer', 'user_like_name' => $carerProfile->full_name
        ])->render();
        DB::table('mails')
            ->insert(
                [
                    'email' => $email,
                    'subject' => 'Cancelling appointment on HOLM',
                    'text' => $text,
                    'time_to_send' => Carbon::now(),
                    'status' => 'new'
                ]);
        */
        $appointment->save();

        return response(['status' => 'success']);
    }

    public function completed(Appointment $appointment){
        $user = Auth::user();

        if($user->user_type_id == 3){
            //Carer
            if($appointment->purchaser_status_id == self::APPOINTMENT_USER_STATUS_COMPLETED){
                $appointment->carer_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
                $appointment->status_id = self::APPOINTMENT_STATUS_COMPLETED;
                $appointment->save();
                event(new AppointmentCompletedEvent($appointment));
            } elseif($appointment->purchaser_status_id == self::APPOINTMENT_USER_STATUS_NEW){
                $appointment->carer_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
                $appointment->save();
            } elseif ($appointment->purchaser_status_id == self::APPOINTMENT_USER_STATUS_REJECTED){
                $appointment->status_id = self::APPOINTMENT_STATUS_DISPUTE;
                $appointment->carer_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
                DisputePayout::create([
                    'appointment_id' => $appointment->id,
                ]);
                $appointment->save();
            }
        } else {
            $appointment->status_id = self::APPOINTMENT_STATUS_COMPLETED;
            $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
            $appointment->save();
            event(new AppointmentCompletedEvent($appointment));
        }

        return response(['status' => 'success']);
    }
}
