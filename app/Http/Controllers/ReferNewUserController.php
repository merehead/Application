<?php

namespace App\Http\Controllers;

use App\MailError;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Swift_TransportException;

class ReferNewUserController extends FrontController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){

//        if(!$this->user)
//            return redirect()->back();

        $this->template = config('settings.frontTheme') . '.templates.purchaserPrivateProfile';

        $this->title = 'Invite new user';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->content = view(config('settings.frontTheme') . '.referUser.content')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function create(Request $request){


        if(!$this->user)
            return redirect()->back();

        if (count($request->get('email'))) {

            $user = $this->user;


            $emails = $request->get('email');
            foreach ($emails as $email) {

                $text = view(config('settings.frontTheme') . '.emails.invite')->with([
                    'user' => $this->user,
                ])->render();

                DB::table('mails')
                    ->insert(
                        [
                            'email' =>$email,
                            'subject' =>'Join Holm and receive £100',
                            'text' =>$text,
                            'time_to_send' => Carbon::now(),
                            'status'=>'new'
                        ]);
            }
        }
        return redirect(route('thankForInvite'));
    }

    public function show(){
        //thank you page
        $this->template = config('settings.frontTheme') . '.templates.purchaserPrivateProfile';

        $this->title = 'Thank you for invite new user';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->content = view(config('settings.frontTheme') . '.referUser.thank')->with($this->vars)->render();

        return $this->renderOutput();
    }
}
