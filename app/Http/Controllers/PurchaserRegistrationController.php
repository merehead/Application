<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repo\PurchaserRegistration;
use App\Postcode;
use App\PurchasersProfile;
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

        $this->title = 'Purchaser Registration';

        $header = view(config('settings.frontTheme') . '.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme') . '.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme') . '.includes.modals')->render();

        $this->vars = array_add($this->vars, 'header', $header);
        $this->vars = array_add($this->vars, 'footer', $footer);
        $this->vars = array_add($this->vars, 'modals', $modals);

        $user = Auth::user();

        if (!$user) {
            $step = view(config('settings.frontTheme').'.purchaserRegistration.Step1_purchaserRegistration')->with($this->vars)->render();
            $this->vars = array_add($this->vars,'activeStep',1);
        } else {
            $purchasersProfile = PurchasersProfile::findOrFail($user->id);

            //dd($purchasersProfile->registration_progress);

/*            if ($carersProfile->registration_progress == '20') {
                return redirect('/im-carer');
            }*/

            $this->vars = array_add($this->vars, 'purchasersProfileID', $purchasersProfile->id);
            $this->vars = array_add($this->vars, 'purchasersProfile', $purchasersProfile);

            if ($this->purchaserProfile->getNextStep() == 'Step4_purchaserRegistration') {
                $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
                $this->vars = array_add($this->vars, 'user', $this->user);
                $this->vars = array_add($this->vars, 'postcodes', $postcodes);
            }
            if ($this->purchaserProfile->getNextStep() == 'Step4_1_purchaserRegistration') {
                $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
                $this->vars = array_add($this->vars, 'user', $this->user);
                $this->vars = array_add($this->vars, 'postcodes', $postcodes);
            }
            $this->vars = array_add($this->vars,'activeStep',$this->purchaserProfile->getActiveStep($user->id));

            $step = view(config('settings.frontTheme').'.purchaserRegistration.'.$this->purchaserProfile->getNextStep())->with($this->vars)->render();

        }


        $this->vars = array_add($this->vars,'step',$step);

        $this->content = view(config('settings.frontTheme') . '.purchaserRegistration.purchaserRegistration')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request) {

       // dd($request->all());


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
