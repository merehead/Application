<?php

namespace App\Http\Controllers\Admin;

use App\CarersProfile;
use App\CarerWages;
use DB;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

class CarerWagesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index()
    {

        $data = CarersProfile::with('CarerWages')->get();
        $this->vars['carers'] = $data;
        $this->content = view(config('settings.theme') . '.CarerWages')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request,CarerWages $wages)
    {
        //dd($request->all());
        $id = $request->get('carer_id');
        $rate = $request->get('hour_rate');
        $wages=$wages->firstOrNew(['carer_id'=>$id]);
        $wages->carer_id=$id;
        $wages->hour_rate=$rate;
        $wages->save();

        return  new JsonResponse(['status'=>'ok']);

    }
}