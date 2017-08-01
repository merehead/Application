<?php

namespace App\Http\Controllers\Registration;

use App\Http\Controllers\Controller;


class CustomerRegistrationController extends Controller
{

    public function __construct()
    {
        //$this->middleware('guest');
    }

    public function index(){


        return view('pages.customer_registr.customer_registr');
    }
}
