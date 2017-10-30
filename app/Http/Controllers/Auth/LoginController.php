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
