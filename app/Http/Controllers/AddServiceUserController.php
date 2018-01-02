<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Repo\PurchaserRegistration;
use App\ServiceUsersProfile;
use Illuminate\Http\Request;

class AddServiceUserController extends FrontController
{
    private $purchaserProfile;


    public function __construct(PurchaserRegistration $purchaserProfile) {
        parent::__construct();
        $this->purchaserProfile = $purchaserProfile;

        $this->template = config('settings.frontTheme').'.templates.userRegistration';
    }





    public function create(Request $request,$type='Someone else'){

        $serviceUsersProfile = new ServiceUsersProfile();
        $serviceUsersProfile->purchaser_id = $this->user->id;
        $serviceUsersProfile->registration_progress = '4_2';
        $serviceUsersProfile->care_for = $type;
        $serviceUsersProfile->save();

        return redirect('/service-registration/'.$serviceUsersProfile->id);
    }


}
