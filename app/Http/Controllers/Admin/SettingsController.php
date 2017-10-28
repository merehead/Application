<?php

namespace App\Http\Controllers\Admin;

use App\Holiday;
use App\User;
use DB;
use Illuminate\Http\Request;

class SettingsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index(){

        $data = User::get()->where('user_type_id','=','4');
        $this->vars['users']=$data;
        $this->content = view(config('settings.theme').'.settings')->with( $this->vars)->render();

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
