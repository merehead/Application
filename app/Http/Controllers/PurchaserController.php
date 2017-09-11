<?php

namespace App\Http\Controllers;

use App\PurchasersProfile;
use Illuminate\Http\Request;

class PurchaserController extends FrontController
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {

        $this->template = config('settings.frontTheme') . '.templates.purchaserPrivateProfile';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);


        //dd();

        if (!$this->user) {
            return;
            //$this->content = view(config('settings.frontTheme') . '.ImCarer.ImCarer')->render();
        } else {

            $purchaserProfile = PurchasersProfile::findOrFail($this->user->id);
            $serviceUsers = $purchaserProfile->serviceUsers;

            $this->vars = array_add($this->vars, 'user', $this->user);
            $this->vars = array_add($this->vars, 'purchaserProfile', $purchaserProfile);
            $this->vars = array_add($this->vars, 'serviceUsers', $serviceUsers);
/*            $postcodes = Postcode::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'postcodes', $postcodes);
            $typeCare = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            //dd($this->user,$carerProfile);*/
            $this->content = view(config('settings.frontTheme') . '.purchaserProfiles.PrivateProfile')->with($this->vars)->render();

        }

        //$step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        //$this->vars = array_add($this->vars,'step',$step);

//        $this->content = view(config('settings.frontTheme').'.homePage.homePage')->with($this->vars)->render();

        //dd($this->content);

        return $this->renderOutput();
    }

    public function update(Request $request) {

        $input = $request->all();
        $purchaserProfile = PurchasersProfile::findOrFail($input['id']);

        if($input['stage'] == 'payment'){

        }
        return response(json_encode(['status'=>'does not save | function don`t result']),400);
        //dd($input,$purchaserProfile);

    }


}
