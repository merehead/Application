<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferNewUser extends FrontController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index(){

        if(!$this->user)
            return redirect()->back();

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

        dd($request->all());

        $this->validate($request,[
            'assistanceType' => 'required|array',
        ]);

        return redirect()->back();
    }
}
