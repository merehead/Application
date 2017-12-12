<?php

namespace App\Http\Controllers\Auth;

use App\CarersProfile;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    public function logout(Request $request)
    {
        $this->performLogout($request);
        if(strpos($request->headers->get('referer'),'leave_review')!==false)
            return redirect()->route('mainHomePage');
        return redirect()->back();
    }

    protected function redirectTo()
    {
        //user_type_id
        // 1 - purchaser
        // 2 - service user ???
        // 3 - carer
        // 4 - admin
        if( Cookie::get('invite')) {
            Cookie::forget('invite');
            return '/invite/refer-users';
        }
        if( Cookie::get('bookingFilter')) {
            Cookie::forget('bookingFilter');
            return '/carer-settings/booking/new/';
        }
        if( Cookie::get('bookingFilterCanceled')) {
            Cookie::forget('bookingFilterCanceled');
            return '/carer-settings/booking/canceled/';
        }
        if( Cookie::get('purchaserbookingFilterCanceled')) {
            Cookie::forget('purchaserbookingFilterCanceled');
            return '/purchaser-settings/booking/canceled/';
        }

        if( Cookie::get('bookingFilterPurchaser')) {
            Cookie::forget('bookingFilter');
            return '/purchaser-settings/booking/pending/';
        }
        if( Cookie::get('referUserProfilePublic')) {
            $url = route('ServiceUserProfilePublic',['serviceUserProfile'=> Cookie::get('referUserProfilePublic')]);
            Cookie::forget('referUserProfilePublic');
            return $url;
        }

        if( Cookie::get('bookingView')) {
            $id = Cookie::get('bookingView');
            Cookie::forget('bookingView');
            return '/bookings/'.$id.'/details';
        }


        if( Cookie::get('CarerRegistration')) {
            Cookie::forget('refer');
            return '/carer-registration/';
        }

        $user = Auth::user();

        switch ($user->user_type_id) {
            case 1 : return '/';
            case 3 : {

                $carerProfile =  CarersProfile::findOrFail($user->id);

                if($carerProfile->registration_status == 'new')
                    return '/carer-registration';
                else
                    return'/carer-settings';
            }
            //case 4 : return '/admin';
        }


        return '/';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
