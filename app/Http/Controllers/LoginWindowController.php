<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginWindowController extends FrontController
{

    public function __construct() {
        parent::__construct();

        $this->template = config('settings.frontTheme').'.homePage.LoginWindow_Session';
    }

    public function index(){

        $this->title = 'Holm Care';
        $this->content ='';
        return $this->renderOutput();
    }
}
