<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repo\CarerRegistration;
use App\Postcode;
use Illuminate\Http\Request;

class CarerRegistrationController extends FrontController
{

    private $carersProfile;

    public function __construct(CarerRegistration $carersProfile) {
        parent::__construct();
        $this->carersProfile = $carersProfile;

        $this->template = config('settings.frontTheme').'.templates.userRegistration';
    }



    public function index(){

        $this->title = 'Carer Registration';


        //dd($this->user);


        $this->vars = array_add($this->vars,'carersProfileID',$this->carersProfile->getID());

        if($this->carersProfile->getNextStep()=='Step4_carerRegistration'){
            $postcodes = Postcode::all()->pluck('name','id')->toArray();
            $this->vars = array_add($this->vars,'postcodes',$postcodes);
        }

        //dd($postcodes);


        $step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        $this->vars = array_add($this->vars,'step',$step);

        $this->content = view(config('settings.frontTheme').'.carerRegistration.carerRegistration')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request) {

        //dd($request->all());

        $this->carersProfile->saveStep($request);

        return redirect('/carer-registration');

    }

}
