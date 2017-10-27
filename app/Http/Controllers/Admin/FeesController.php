<?php

namespace App\Http\Controllers\Admin;

use App\Fees;
use PaymentTools;
use DB;
use Illuminate\Http\Request;

class FeesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(){

        $data = Fees::all();
        $this->vars['fees']=$data;
        $this->content = view(config('settings.theme').'.fees')->with( $this->vars)->render();

        return $this->renderOutput();
    }
}
