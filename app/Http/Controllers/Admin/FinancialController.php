<?php

namespace App\Http\Controllers\Admin;

use PaymentTools;
use DB;
use Illuminate\Http\Request;

class FinancialController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(){
//        $res = DB::table('bonus_payouts')
//            ->join('users', 'bonus_payouts.user_id', '=', 'users.id')
//            ->select('bonus_payouts.id')
//            ->where('users.user_type_id', 3)
//            ->get();
//
//        $res = $res->pluck('id')->toArray();
//
        $this->vars['balance'] = PaymentTools::getBalance()/100;

        $res = DB::select("SELECT SUM(fee) as fee FROM stripe_charges");
        $this->vars['fee'] = $res[0]->fee / 100;

        $res = DB::select("SELECT SUM(amount) as income FROM stripe_charges");
        $this->vars['income'] = $res[0]->income / 100;

        $this->content = view(config('settings.theme').'.financial')->with($this->vars)->render();

        return $this->renderOutput();
    }
}
