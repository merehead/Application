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
        $input = $request->all();
        switch ($input['type']){
            case 'password':
                $user_id = $input['id'];
                $obj_user = User::find($user_id)->first();
                $obj_user->password = Hash::make($input['newPassword']);
                $obj_user->save();

                return response()->json(["result"=>true]);
                break;
        }
        if($input['type']){

        }

        return $this->renderOutput();
    }
}
