<?php

namespace App\Http\Controllers\Admin;

use App\Holiday;
use App\User;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class SettingsController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
        $this->template = config('settings.theme') . '.templates.adminBase';
    }

    public function index()
    {

        $data = User::get()->where('user_type_id', '=', '4');
        $this->vars['users'] = $data;
        $this->content = view(config('settings.theme') . '.settings')->with($this->vars)->render();

        return $this->renderOutput();
    }

    public function update(Request $request)
    {
        $input = $request->all();
        switch ($input['type']) {
            case 'password':
                $user_id = $input['id'];
                $obj_user = User::find($user_id)->first();
                $obj_user->password = Hash::make($input['newPassword']);
                $obj_user->save();
                return response()->json(["result" => true]);
                break;
            case 'invite':
                try {
                    if(User::where('email','=',$input['email'])->count()==0) {
                        $password = str_random(8);
                        $user = new User();
                        $user->password = Hash::make('3Vvm{ZG6');
                        $user->email = $input['email'];
                        $user->user_type_id = 4;
                        $user->save();
                        $text = view(config('settings.frontTheme') . '.emails.invite_admins')->with([
                            'email' => $input['email'], 'password' => $password
                        ])->render();

                        DB::table('mails')
                            ->insert(
                                [
                                    'email' => $input['email'],
                                    'subject' => 'INVITE ADMINS',
                                    'text' => $text,
                                    'time_to_send' => date('Y-m-d H:i:s'),
                                    'status' => 'new'
                                ]);
                        return response()->json(["result" => true]);
                    }else return response()->json(["result" => false, 'msg' => 'User is exist. To change email.']);
                    break;
                } catch (Exception $e) {
                    return response()->json(["result" => false, 'msg' => ' Sorry something went worng. Please try again.']);
                }
        }

        return $this->renderOutput();
    }
}
