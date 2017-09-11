<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Mail;

class ContactController extends FrontController
{

    public function __construct() {
        parent::__construct();

        $this->template = config('settings.frontTheme').'.templates.homePage';
    }

    public function index(){

        $this->title = 'Holm Care - About Us';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->content = view(config('settings.frontTheme').'.homePage.contactPage')->render();

        return $this->renderOutput();
    }

    public function thank(){

        $this->title = 'Holm Care - About Us';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->content = view(config('settings.frontTheme').'.homePage.ThankYouContact')->render();

        return $this->renderOutput();
    }

    public function send(Request $request){

        $input = $request->all();
        $message = '';
        $message .= 'My Name:'. $input['name'].PHP_EOL;
        $message .= 'My email:'. $input['email'].PHP_EOL;
        $message .= 'My phone:'. $input['phone'].PHP_EOL;
        $content = [
            'title'=>  $input['topic'],
            'body'=> $message.'<br/><br/> Message:'.$input['message']
        ];

        $receiverAddress = 'info@holm.care';

        Mail::to($receiverAddress)->send(new OrderShipped($content));

        return redirect()->route('ThankPage');

    }
}
