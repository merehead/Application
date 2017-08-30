<?php

namespace App\Http\Controllers\Auth;

use App\CarersProfile;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    protected function redirectTo()
    {
        //user_type_id
        // 1 - purchaser
        // 2 - service user ???
        // 3 - carer
        // 4 - admin

        $user = Auth::user();

        switch ($user->user_type_id) {
            case 1 : return '/';
            case 3 : {

                $carerProfile =  CarersProfile::findOrFail($user->id);

                if($carerProfile->registration_progress != '20')
                    return '/carer-registration';
                else
                    return'/im-carer';
            }
            //case 4 : return '/admin';
        }

        return '/home';
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
