<?php

namespace App\Http\Controllers\Admin;

use App\CarersProfile;
use App\CarerWages;
use DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\JsonResponse;

class CarerWagesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(CarersProfile $wages)
    {
        //$data = CarersProfile::with('CarerWages')->get();
        $model = $wages;
        $data = $model::with('CarerWages')->select('*')->where('profiles_status_id','=',2)->paginate(Config::get('settings.AdminUserPagination'));

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

    public function filterCarerWages($carerId, $filter){
        if($filter == null) return;//Если фильтр не задан, не продолжаем
        $data = CarerWages::where('profiles_status_id',2)->
            where('id', $carerId)->
            where(function ($q) use ($filter) {
                $q->where('id', $filter)->orWhere('first_name', $filter)->orWhere('family_name', $filter);
            })->toSql();
        return $data;
        if (Request::ajax()) {
            return Response::json(View::make('carerWagesTableBody', array('data' => $data))->render());
        }
        return View::make('carerWagesTableBody', array('data' => $data));

    }
}
