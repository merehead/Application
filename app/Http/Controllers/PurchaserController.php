<?php

namespace App\Http\Controllers;

use App\Booking;
use App\Interfaces\Constants;
use App\PurchasersProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use Auth;

class PurchaserController extends FrontController implements Constants
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index($id=null)
    {

        $this->template = config('settings.frontTheme') . '.templates.purchaserPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);




        if (!$this->user) {
            return redirect('/enter');
            //$this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        } else {

            $newBookings = Booking::whereIn('status_id', [self::AWAITING_CONFIRMATION])->where('purchaser_id', $this->user->id)->get();
            $this->vars = array_add($this->vars, 'newBookings', $newBookings);

            if(!empty($id) && Auth::user()->user_type_id==4){ //админ
                $purchaserProfile = PurchasersProfile::findOrFail($id);
            } else {
                $purchaserProfile = PurchasersProfile::findOrFail($this->user->id);
            }

            $serviceUsers = $purchaserProfile->serviceUsers;

            $this->vars = array_add($this->vars, 'user', $this->user);
            $this->vars = array_add($this->vars, 'purchaserProfile', $purchaserProfile);
            $this->vars = array_add($this->vars, 'serviceUsers', $serviceUsers);

            $this->content = view(config('settings.frontTheme') . '.purchaserProfiles.PrivateProfile')->with($this->vars)->render();

        }

        return $this->renderOutput();
    }




    public function update(Request $request) {

        $input = $request->all();
        $purchaserProfile = PurchasersProfile::findOrFail($input['id']);

        if($input['stage'] == 'payment'){
            return response(json_encode(['status'=>'does not save | function don`t result']),400);
        }

        $depart = '';

        if ($input['stage'] == 'general') {

            $this->validate($request, [

                'like_name' =>
                    array(
                        'required',
                        'string',
                        'max:128'
                    ),
                'mobile_number' =>
                    array(
                        'required',
                        'regex:/^0[0-9]{10}$/',
                    ),
                'address_line1' =>
                    array(
                        'required',
                        'string',
                        'max:256'
                    ),
                'address_line2' =>
                    array(
                        'nullable',
                        'string',
                        'max:256'
                    ),
                'town' =>
                    array(
                        'required',
                        'string',
                        'max:128'
                    ),
                'postcode' =>
                    array(
                        'required',
                        'regex:/^(([Bb][Ll][0-9])|([Mm][0-9]{1,2})|([Oo][Ll][0-9]{1,2})|([Ss][Kk][0-9]{1,2})|([Ww][AaNn][0-9]{1,2})) {0,}([0-9][A-Za-z]{2})$/',
                        ),

            ]);
            $depart = "#PrivateGeneral";

            if (isset($input['like_name'])) $purchaserProfile->like_name = $input['like_name'];
            if (isset($input['address_line1'])) $purchaserProfile->address_line1 = $input['address_line1'];
            if (isset($input['address_line2'])) $purchaserProfile->address_line2 = $input['address_line2'];
            if (isset($input['town'])) $purchaserProfile->town = $input['town'];
            if (isset($input['postcode'])) $purchaserProfile->postcode = $input['postcode'];
            if (isset($input['mobile_number'])) $purchaserProfile->mobile_number = $input['mobile_number'];
/*            if (isset($input['sentence_yourself'])) $purchaserProfile->sentence_yourself = $input['sentence_yourself'];
            if (isset($input['description_yourself'])) $purchaserProfile->description_yourself = $input['description_yourself'];*/

            $purchaserProfile->save();

            unset($carerProfiles);
        }



        if ($input['stage'] == 'payment') {

            $depart = "#Payment";

            $purchaserProfile = PurchasersProfile::findOrFail($input['id']);

            if (isset($input['name_of_cardholder'])) $purchaserProfile->name_of_cardholder = $input['name_of_cardholder'];
            if (isset($input['payment_card_number'])) $purchaserProfile->payment_card_number = $input['payment_card_number'];
            if (isset($input['expiry_date'])) $purchaserProfile->sort_code = $input['expiry_date'];
            if (isset($input['cvv'])) $purchaserProfile->cvv = $input['cvv'];
            if (isset($input['paypal_amazon_details'])) $purchaserProfile->paypal_amazon_details = $input['paypal_amazon_details'];

            $purchaserProfile->save();
            unset($purchaserProfile);
        }
        return Redirect::to(URL::previous() . $depart);
    }


    public function bookingFilter($status = 'all',Request $request)
    {
        $user = Auth::user();

        $this->template = config('settings.frontTheme') . '.templates.purchaserPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        //dd();

        if (!$this->user) {
            return redirect('/');
            //$this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        } else {

            $purchaserProfile = PurchasersProfile::findOrFail($this->user->id);
            $serviceUsers = $purchaserProfile->serviceUsers;

            $this->vars = array_add($this->vars, 'user', $this->user);
            $this->vars = array_add($this->vars, 'purchaserProfile', $purchaserProfile);
            $this->vars = array_add($this->vars, 'serviceUsers', $serviceUsers);

            $this->vars = array_add($this->vars, 'status', $status);
            $page = $request->get('page',1);
            $perPage = 5;
            $start = ($page - 1) * $perPage;
            if ($page == 1) {
                $start = 0;
            }
            $this->vars = array_add($this->vars, 'page', $page);


            $newBookingsAll = Booking::whereIn('status_id', [self::AWAITING_CONFIRMATION])->where('purchaser_id', $user->id)->get();
            $newBookings = Booking::whereIn('status_id', [self::AWAITING_CONFIRMATION])->where('purchaser_id', $user->id)->skip($start)->take($perPage)->get();
            $this->vars = array_add($this->vars, 'newBookings', $newBookings);
            $this->vars = array_add($this->vars, 'newBookingsAll', $newBookingsAll);
            if($request->ajax()&&$status=='new'){
                $this->content = view(config('settings.frontTheme') . '.purchaserProfiles.Booking.BookingRowNewAjax')->with($this->vars)->render();
                return response()->json(["result" => true,'content'=>$this->content,'hideLoadMore'=>$newBookingsAll->count()<=($perPage*$page),'countAll'=>$newBookingsAll->count()]);
            }
            // ---------------  In progress booking --------------------------------
            $inProgressBookingsAll = Booking::whereIn('status_id', [self::CONFIRMED, self::IN_PROGRESS, self::DISPUTE])->where('purchaser_id', $user->id)->get();
            $inProgressBookings = Booking::whereIn('status_id', [self::CONFIRMED, self::IN_PROGRESS, self::DISPUTE])->where('purchaser_id', $user->id)->skip($start)->take($perPage)->get();
            $inProgressAmount = 0;
            foreach ($inProgressBookings as $booking){
                $inProgressAmount += $booking->purchaser_price;
            }

            $this->vars = array_add($this->vars, 'inProgressBookingsAll', $inProgressBookingsAll);
            $this->vars = array_add($this->vars, 'inProgressBookings', $inProgressBookings);
            $this->vars = array_add($this->vars, 'inProgressAmount', $inProgressAmount);
            if($request->ajax()&&$status=='progress'){
                $this->content = view(config('settings.frontTheme') . '.purchaserProfiles.Booking.BookingRowInProgressAjax')->with($this->vars)->render();
                return response()->json(["result" => true,'content'=>$this->content,'hideLoadMore'=>$inProgressBookingsAll->count()<=($perPage*$page),'countAll'=>$inProgressBookingsAll->count()]);
            }
            // ---------------------------------------------------------------------

            // --------------- Completed booking --------------------------------
            $completedBookingsAll = Booking::where('status_id', 7)->where('purchaser_id', $user->id)->get();
            $completedBookings = Booking::where('status_id', 7)->where('purchaser_id', $user->id)->skip($start)->take($perPage)->get();
            $completedAmount = 0;
            foreach ($completedBookings as $booking){
                $completedAmount += $booking->purchaser_price;
            }
            $this->vars = array_add($this->vars, 'completedBookingsAll', $completedBookingsAll);
            $this->vars = array_add($this->vars, 'completedBookings', $completedBookings);
            $this->vars = array_add($this->vars, 'completedAmount', $completedAmount);

            if($request->ajax()&&$status=='completed'){
                $this->content = view(config('settings.frontTheme') . '.purchaserProfiles.Booking.BookingRowCompletedAjax')->with($this->vars)->render();
                return response()->json(["result" => true,'content'=>$this->content,'hideLoadMore'=>$completedBookingsAll->count()<=($perPage*$page),'countAll'=>$completedBookingsAll->count()]);
            }
            // -------------------------------------------------------------------

            // --------------- Canceled booking --------------------------------
            $canceledBookingsAll = Booking::where('status_id', 4)->where('purchaser_id', $user->id)->get();
            $canceledBookings = Booking::where('status_id', 4)->where('purchaser_id', $user->id)->skip($start)->take($perPage)->get();
            $this->vars = array_add($this->vars, 'canceledBookings', $canceledBookings);
            $this->vars = array_add($this->vars, 'canceledBookingsAll', $canceledBookingsAll);
            if($request->ajax()&&$status=='canceled'){
                $this->content = view(config('settings.frontTheme') . '.CarerProfiles.Booking.BookingRowCanceledAjax')->with($this->vars)->render();
                return response()->json(["result" => true,'content'=>$this->content,'hideLoadMore'=>$canceledBookingsAll->count()<=($perPage*$page),'countAll'=>$canceledBookingsAll->count()]);
            }
            $this->content = view(config('settings.frontTheme') . '.purchaserProfiles.Booking.BookingTaball')->with($this->vars)->render();

        }


        return $this->renderOutput();
    }

}
