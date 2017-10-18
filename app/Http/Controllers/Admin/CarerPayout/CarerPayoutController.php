<?php

namespace App\Http\Controllers\Admin\CarerPayout;

use App\Appointment;
use App\AppointmentStatus;
use App\CarersProfile;
use App\Http\Controllers\Admin\AdminController;
use App\Interfaces\Constants;
use App\User;
use Illuminate\Http\Request;


class CarerPayoutController extends AdminController implements Constants
{

    //private $disputePayout;

    public function __construct(/*AdminBookings $booking*/) {
        parent::__construct();
        //$this->booking = $booking;

        $this->template = config('settings.theme').'.templates.adminBase';
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $filter = FALSE;

        $input = $request->all();

        if (isset($input['filter'])) {$input['filter'] != 0 ? $filter = ['status_id','=',$input['filter']] : $filter = FALSE;}

        $this->title = 'Payout to carers';

        //$users = User::where('user_type_id','3')->get();

        $carers = CarersProfile::all()->take(20);
        $this->vars = array_add($this->vars,'carers',$carers);

        $appointmentStatus = AppointmentStatus::all()->pluck('name','id')->toArray();
        $this->vars = array_add($this->vars,'appointmentStatus',$appointmentStatus);


        $this->content = view(config('settings.theme').'.carerPayouts.carerPayouts')->with($this->vars)->render();

        return $this->renderOutput();
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
