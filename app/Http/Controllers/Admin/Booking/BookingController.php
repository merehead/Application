<?php

namespace App\Http\Controllers\Admin\Booking;

use App\Appointment;
use App\Booking;
use App\Booking_appointment_frequency;
use App\Booking_appointment_status;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statuses = Booking_appointment_status::all();
        $frequencies = Booking_appointment_frequency::all();
        $transactions = Transaction::all();
        $bookings = Booking::all();
        $appointments = Appointment::all();

        $appointment = Appointment::find(1);

        $booking = Booking::find(1);

        $transaction = Transaction::find(1);

        $frequency = Booking_appointment_frequency::find(5);

        $status = Booking_appointment_status::find(2);

        $user = User::find(1);


        dd($user,$user->userPurchaser,$user->userService,$user->userCarer);

        dd($status,$status->statusAppointments,$status->statusCarerAppointments,$status->statusPurchaserAppointments,$status->statusBookings,$status->statusCarerBookings,$status->statusPurchaserBookings);

        dd($frequency,$frequency->bookings);

        dd($transaction,$transaction->appointments);

        dd($booking,$booking->bookingPurchaser,$booking->bookingServiceUser,$booking->bookingCarer,$booking->frequency,$booking->bookingStatus,$booking->bookingStatusCarer,$booking->bookingStatusPurchaser,$booking->appointments);

        dd($appointment, $appointment->booking,$appointment->transaction,$appointment->appointmentStatus,$appointment->appointmentStatusCarer,$appointment->appointmentStatusPurchaser);

        dd($statuses,$frequencies,$transactions,$bookings,$appointments);

        return 'booking index';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
