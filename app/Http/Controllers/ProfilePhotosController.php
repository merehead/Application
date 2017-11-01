<?php

namespace App\Http\Controllers;

use App\ServiceUsersProfile;
use App\User;
use Illuminate\Http\Request;
use Auth;

class ProfilePhotosController extends Controller
{
    public function uploadUserProfilePhoto(Request $request){
//        $user = Auth::user();
        $user = User::find(1);
        $base64 = $request->image;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        file_put_contents('img/profile_photos/'.$user->id.'.png', $data);
        $image = new \Imagick('img/profile_photos/'.$user->id.'.png');
        $this->autoRotateImage($image);
        $image->writeImage('img/profile_photos/'.$user->id.'.png');
        return response(['status' => 'success']);
    }

    public function uploadServiceUserProfilePhoto(Request $request){
        $serviceUser = ServiceUsersProfile::find($request->service_user_id);
        $base64 = $request->image;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64));
        file_put_contents('img/service_user_profile_photos/'.$serviceUser->id.'.png', $data);
        $image = new \Imagick('img/service_user_profile_photos/'.$serviceUser->id.'.png');
        $this->autoRotateImage($image);
        $image->writeImage('img/service_user_profile_photos/'.$serviceUser->id.'.png');
        return response(['status' => 'success']);
    }

    private function autoRotateImage($image) {
        $orientation = $image->getImageOrientation();

        switch($orientation) {
            case \imagick::ORIENTATION_BOTTOMRIGHT:
                $image->rotateimage("#000", 180); // rotate 180 degrees
                break;

            case \imagick::ORIENTATION_RIGHTTOP:
                $image->rotateimage("#000", 90); // rotate 90 degrees CW
                break;

            case \imagick::ORIENTATION_LEFTBOTTOM:
                $image->rotateimage("#000", -90); // rotate 90 degrees CCW
                break;
        }

        // Now that it's auto-rotated, make sure the EXIF data is correct in case the EXIF gets saved with the image!
        $image->setImageOrientation(\imagick::ORIENTATION_TOPLEFT);
    }
}
