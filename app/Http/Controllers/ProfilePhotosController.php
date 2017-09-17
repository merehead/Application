<?php

namespace App\Http\Controllers;

use App\ServiceUsersProfile;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ProfilePhotosController extends Controller
{
    public function uploadUserProfilePhoto(Request $request){
        $user = Auth::user();
//        $user = User::find(1);
        $base64 = $request->image;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        file_put_contents('img/profile_photos/'.$user->id.'.png', $data);
        return response(['status' => 'success']);
    }

    public function uploadServiceUserProfilePhoto(Request $request){
        $serviceUser = ServiceUsersProfile::find($request->service_user_id);
        $base64 = $request->image;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        file_put_contents('img/service_user_profile_photos/'.$serviceUser->id.'.png', $data);
        return response(['status' => 'success']);
    }
}
