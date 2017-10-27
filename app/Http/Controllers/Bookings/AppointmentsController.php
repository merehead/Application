<?php

namespace App\Http\Controllers\Bookings;
use App\Appointment;
use App\DisputePayout;
use App\Events\AppointmentCompletedEvent;
use App\Http\Controllers\Controller;
use App\Interfaces\Constants;
use Auth;
use SmsTools;

use Illuminate\Http\Request;

class AppointmentsController extends Controller implements Constants
{
    public function reject(Appointment $appointment){
        $user = Auth::user();
        if($user->user_type_id == 3){
            //Carer
            $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
            $appointment->carer_status_id =  self::APPOINTMENT_USER_STATUS_REJECTED;
            $message = 'Sorry. '.$appointment->booking->bookingCarerProfile->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
            SmsTools::sendSmsToCarer($message, $appointment->booking->bookingServiceUser);
        } else {
            //Purchaser
            if($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_NEW){
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
            } elseif($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_COMPLETED) {
                $appointment->status_id = self::APPOINTMENT_STATUS_DISPUTE;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
                DisputePayout::create([
                    'appointment_id' => $appointment->id,
                ]);
            } elseif ($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_REJECTED){
                $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
            }
            $message = 'Sorry. '.$appointment->booking->bookingServiceUser->full_name.' has cancelled your appointment for  '.$appointment->formatted_date_start.' '.$appointment->formatted_time_from.'. Please check your account for more details. The Holm Team';
            SmsTools::sendSmsToCarer($message, $appointment->booking->bookingCarerProfile);
        }

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
