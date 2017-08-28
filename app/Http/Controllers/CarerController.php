<?php

namespace App\Http\Controllers;

use App\CarersProfile;
use Illuminate\Http\Request;

class CarerController extends FrontController
{
    //private $carersProfile;

    public function __construct() {
        parent::__construct();
        //$this->carersProfile = $carersProfile;

        $this->template = config('settings.frontTheme').'.templates.ImCarer';
    }



    public function index(){

        $this->title = 'Holm Care';

        if (!$this->user){
            $this->content = view(config('settings.frontTheme').'.ImCarer.ImCarer')->render();
        } else {
            $carerProfile = CarersProfile::findOrFail($this->user->id);
            if($carerProfile->registration_progress!='20'){
                return redirect()->action('CarerRegistrationController@index');
            }
            $this->vars = array_add($this->vars,'user',$this->user);
            $this->vars = array_add($this->vars,'carerProfile',$carerProfile);

            //dd($this->user,$carerProfile);
            $this->content = view(config('settings.frontTheme').'.CarerProfiles.PrivateProfile')->with($this->vars)->render();
        }


        //$step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        //$this->vars = array_add($this->vars,'step',$step);

//        $this->content = view(config('settings.frontTheme').'.homePage.homePage')->with($this->vars)->render();

        //dd($this->content);

        return $this->renderOutput();
    }
}
