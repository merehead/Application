<?php

namespace App\Http\Controllers\Bookings;
use App\Appointment;
use App\Http\Controllers\Controller;
use App\Interfaces\Constants;
use Auth;

use Illuminate\Http\Request;

class AppointmentsController extends Controller implements Constants
{
    public function reject(Appointment $appointment){
        $user = Auth::user();
        if($user->user_type_id == 3){
            //Carer
            $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
            $appointment->carer_status_id =  self::APPOINTMENT_USER_STATUS_REJECTED;
        } else {
            //Purchaser
            if($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_NEW){
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
            } elseif($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_COMPLETED) {
                $appointment->status_id = self::APPOINTMENT_STATUS_DISPUTE;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
            } elseif ($appointment->carer_status_id == self::APPOINTMENT_USER_STATUS_REJECTED){
                $appointment->status_id = self::APPOINTMENT_STATUS_CANCELLED;
                $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_REJECTED;
            }
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
            } elseif($appointment->purchaser_status_id == self::APPOINTMENT_USER_STATUS_NEW){
                $appointment->carer_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
            } elseif ($appointment->purchaser_status_id == self::APPOINTMENT_USER_STATUS_REJECTED){
                $appointment->status_id = self::APPOINTMENT_STATUS_DISPUTE;
                $appointment->carer_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
            }
        } else {
            $appointment->status_id = self::APPOINTMENT_STATUS_COMPLETED;
            $appointment->purchaser_status_id = self::APPOINTMENT_USER_STATUS_COMPLETED;
        }

        $appointment->save();

        return response(['status' => 'success']);
    }
}
