<?php

namespace App\Http\Controllers;

use App\CarersProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class HomePageController extends FrontController
{

    public function __construct() {
        parent::__construct();

        $this->template = config('settings.frontTheme').'.templates.homePage';
    }

    public function index(){

        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $topCarers = collect();

        foreach ($this->getTopCarers() as $carer){

            $topCarers->push(CarersProfile::find($carer->id));
        }

        //dd($topCarers);

        $this->vars = array_add($this->vars,'topCarers',$topCarers);

        $this->content = view(config('settings.frontTheme').'.homePage.homePage')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function getTopCarers(){

        return DB::select("SELECT cp.id, cp.first_name,cp.family_name,cp.sentence_yourself 
FROM `carers_profiles` as cp
WHERE 1 LIMIT 0,12");

    }

}
