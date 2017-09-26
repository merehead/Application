<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\FrontController;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends FrontController
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->title ='Holm - Reset Password';
        $this->template = config('settings.frontTheme').'.templates.homePage';
    }

    public function showLinkRequestForm()
    {



        $this->title ='Holm - Reset Password';
        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->vars = array_add($this->vars,'title', $this->title);


        $this->content = view('auth.passwords.myPasswordReset',$this->vars)->render();

        $this->vars = array_add($this->vars,'content',$this->content);
        return $this->renderOutput();

    }
}
