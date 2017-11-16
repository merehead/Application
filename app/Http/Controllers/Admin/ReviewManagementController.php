<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use PaymentTools;
use DB;


class ReviewManagementController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(){

        $data = Holiday::all();
        $this->vars['holiday']=$data;
        $this->content = view(config('settings.theme').'.review_management')->with( $this->vars)->render();

        return $this->renderOutput();
    }
}
