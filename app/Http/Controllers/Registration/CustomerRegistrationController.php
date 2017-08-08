<?php

namespace App\Http\Controllers\Registration;

use App\User;
use App\TempUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class CustomerRegistrationController extends Controller
{


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index($step_token = null){

        if(is_null($step_token))
            return view('pages.customer_registr.steps.step_1');
    }

    public function ajax(Request $request){
        return response()->json($request->email);
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }*/


}
