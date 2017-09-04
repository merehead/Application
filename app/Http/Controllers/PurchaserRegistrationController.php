<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repo\PurchaserRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaserRegistrationController extends FrontController
{
    private $purchaserProfile;

    public function __construct(PurchaserRegistration $purchaserProfile) {
        parent::__construct();
        $this->purchaserProfile = $purchaserProfile;

        $this->template = config('settings.frontTheme').'.templates.userRegistration';
    }

    public function index()
    {

        $this->title = 'Carer Registration';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $user = Auth::user();

        //dd('CarerRegistrationController index' , $user);

        if (!$user) {
            $step = view(config('settings.frontTheme').'.purchaserRegistration.Step1_purchaserRegistration')->with($this->vars)->render();
            $this->vars = array_add($this->vars,'activeStep',1);

            //dd($this->vars);
        }


        $this->vars = array_add($this->vars,'step',$step);

        $this->content = view(config('settings.frontTheme') . '.carerRegistration.carerRegistration')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request) {

        dd($request->all());


/*        if ($request->has('stepback')) {
            //dd($request->all());

            $stepback = $request->stepback;

            $carerProfiles = CarersProfile::findOrFail($request->input('carersProfileID'));

            $carerProfiles->registration_progress = $request->input('stepback');

            $carerProfiles->save();

        } else {*/

            $this->purchaserProfile->saveStep($request);
        //}


        return redirect('/purchaser-registration');

    }
}
