<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home');
        return redirect('/admin');
    }

    public function  unsubscribe($id){

        $user = User::find($id);
        if(isset($user->email)){
            $user->subscribe=0;
            $user->save();
        }

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $vars = array();
        $vars = array_add($vars,'title','Holm');
        $vars = array_add($vars,'description','');
        $vars = array_add($vars,'keywords','');
        $vars = array_add($vars,'keywords','');
        $vars = array_add($vars,'header',$header);
        $vars = array_add($vars,'footer',$footer);
        $vars = array_add($vars,'modals',$modals);



        $content = view(config('settings.frontTheme').'.homePage.ThankYouUnsubscribe')->render();
        $vars = array_add($vars,'content',$content);

        return view(config('settings.frontTheme').'.templates.homePage')->with($vars);
    }
}