<?php

namespace App\Http\Controllers\Bookings;
use App\Appointment;
use App\Http\Controllers\Controller;
use App\Interfaces\Constants;
use Auth;

use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function reject(Appointment $appointment){
        $user = Auth::user();
        if($user->user_type_id == 3){
            //Carer
            $appointment->status_id = 5;
            $appointment->carer_status_id = 5;
        } else {
            if($appointment->carer_status_id == 5){
                $appointment->status_id = 5;
                $appointment->purchaser_status_id = 5;
            } else {
                $appointment->status_id = 3;
                $appointment->purchaser_status_id = 5;
            }
        }

        $appointment->save();

        return response(['status' => 'success']);
    }

    public function completed(Appointment $appointment){
        $user = Auth::user();

        if($user->user_type_id == 3){
            if($appointment->purchaser_status_id == 2){
                $appointment->status_id = 2;
                $appointment->purchaser_status_id = 2;
            } else {
                $appointment->purchaser_status_id = 2;
            }
        } else {
            $appointment->status_id = 2;
            $appointment->carer_status_id = 2;
        }

        $appointment->save();

        return response(['status' => 'success']);
    }
}
