<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends FrontController
{

    public function __construct() {
        parent::__construct();

        $this->template = config('settings.frontTheme').'.templates.homePage';
    }

    public function index(){

        $this->title = 'Holm Care - About Us';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $this->content = view(config('settings.frontTheme').'.homePage.faqPage')->render();

        return $this->renderOutput();
    }
}