<?php

namespace App\Http\Controllers;

use App\MailError;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

use Swift_TransportException;

class ContactController extends FrontController
{

    public function __construct() {
        parent::__construct();

        $this->template = config('settings.frontTheme').'.templates.homePage';
    }

    public function index(){

        $this->title = 'Contact us - HOLM CARE';
        $this->description = '';
        $this->keywords='';

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


        $this->title = 'Contact us - HOLM CARE';
        $this->description = '';
        $this->keywords='';

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

        $text = view(config('settings.frontTheme') . '.emails.contact')->with([
            'userMessage'=>$input['message'],'phone'=>$input['phone'],'email'=>$input['email'],'userName'=>$input['name']
        ])->render();

        DB::table('mails')
            ->insert(
                [
                    'email' =>'info@holm.care',
                    'subject' =>$input['topic'],
                    'text' =>$text,
                    'time_to_send' => Carbon::now(),
                    'status'=>'new'
                ]);

        return redirect()->route('ThankPage');

    }
}
