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
            if($appointment->purchaser_status_id == 4){
                $appointment->status_id = 4;
                $appointment->purchaser_status_id = 4;
            } else {
                $appointment->status_id = 3;
                $appointment->purchaser_status_id = 4;
            }
        } else {
            $appointment->status_id = 4;
            $appointment->carer_status_id = 4;
        }

        $appointment->save();

        return response(['status' => 'success']);
    }
}
