<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App\BookingOverview;
use DB;


class ReviewManagementController extends AdminController
{

    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(){

        $data = BookingOverview::all();
        $this->vars['reviews']=$data;
        $this->content = view(config('settings.theme').'.review_management')->with( $this->vars)->render();

        return $this->renderOutput();
    }
}
