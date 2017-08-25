<?php

namespace App\Http\Controllers;

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

        //$step = view(config('settings.frontTheme').'.carerRegistration.'.$this->carersProfile->getNextStep())->with($this->vars)->render();
        //$this->vars = array_add($this->vars,'step',$step);

//        $this->content = view(config('settings.frontTheme').'.homePage.homePage')->with($this->vars)->render();
        $this->content = view(config('settings.frontTheme').'.ImCarer.ImCarer')->render();

        //dd($this->content);

        return $this->renderOutput();
    }
}
