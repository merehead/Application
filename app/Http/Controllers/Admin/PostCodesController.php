<?php

namespace App\Http\Controllers\Admin;

use App\Holiday;
use App\PostCodes;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class PostCodesController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(Request $request){
        $postcode = new PostCodes;
        if(!empty($request->get('codes')))
            $data = $postcode->select('*')->where('code','=',$request->get('codes'))->orderByDesc('amount')->paginate(Config::get('settings.AdminUserPagination'));
        else
            $data = $postcode->select('*')->orderByDesc('amount')->paginate(Config::get('settings.AdminUserPagination'));
        $this->vars['PostCodes']=$data;
        $this->content = view(config('settings.theme').'.postCodes')->with( $this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request){

        foreach ($request->holiday['id'] as $key => $item) {
            $holidays=Holiday::find($item);
            $holidays->date=$request->holiday['date'][$key];

            $holidays->save();
        }


        $data = Holiday::all();
        $this->vars['holiday']=$data;
        $this->content = view(config('settings.theme').'.holidays')->with( $this->vars)->render();

        return $this->renderOutput();
    }
}
