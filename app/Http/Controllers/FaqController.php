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

        $this->title = 'FAQS - HOLM CARE';
        $this->description = 'Have to know before finding in home care for elderly on our personal home care online market place ';
        $this->keywords='how to find a private carer, private carer looking for work, how do i find a personal assistant, hire part time personal assistant';

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
