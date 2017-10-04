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
/*        $message = '';
        $message .= 'My Name:'. $input['name'].PHP_EOL;
        $message .= 'My email:'. $input['email'].PHP_EOL;
        $message .= 'My phone:'. $input['phone'].PHP_EOL;
        $content = [
            'title'=>  $input['topic'],
            'body'=> $message.'<br/><br/> Message:'.$input['message']
        ];


        $receiverAddress = 'info@holm.care';

        Mail::to($receiverAddress)->send(new OrderShipped($content));*/

        try {

            Mail::send(config('settings.frontTheme') . '.emails.contact',
                ['userMessage'=>$input['message'],'phone'=>$input['phone'],'email'=>$input['email'],'userName'=>$input['name']],
                function ($m) use ($input) {
                    $m->from($input['email'])->to('info@holm.care')->subject($input['topic']);
                });
        }
        catch (Swift_TransportException $STe){

            $error = MailError::create([
                'error_message'=>$STe->getMessage(),
                'function'=>__METHOD__,
                'action'=>'Try to sent contact form',
                //'user_id'=>$user->id
            ]);
        }



        return redirect()->route('ThankPage');

    }
}
