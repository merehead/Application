<?php

namespace App\Http\Controllers;

use App\AssistanceType;
use App\Booking;
use App\Floor;
use App\Interfaces\Constants;
use App\Language;
use App\ServiceUsersProfile;
use App\WorkingTime;
use Illuminate\Http\Request;
use Auth;

class ServiceUserPrivateProfileController extends FrontController implements Constants
{
    public function __construct()
    {
        parent::__construct();

    }

    public function index($serviceUserProfile)
    {


        //dd($serviceUserProfile);

        $this->template = config('settings.frontTheme') . '.templates.serviceUserPrivateProfileTemplate';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        if (!$this->user) {
            abort(404);
        } else {

            $serviceUsersProfile = ServiceUsersProfile::findOrFail($serviceUserProfile);

            $this->vars = array_add($this->vars, 'user', $this->user);

            $this->vars = array_add($this->vars, 'serviceUsersProfile', $serviceUsersProfile);
            $this->vars = array_add($this->vars, 'userNameForSite', $serviceUsersProfile->like_name);

            $typeCare = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            $floors = Floor::all()->pluck('name', 'id')->toArray();
            $this->vars = array_add($this->vars, 'floors', $floors);
            $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.PrivateProfile')->with($this->vars)->render();

        }

        return $this->renderOutput();
    }

    public function profile($serviceUserProfile)
    {

        //dd($serviceUserProfile);

        $this->template = config('settings.frontTheme') . '.templates.serviceUserPrivateProfileTemplate';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        if (!$this->user) {
            abort(404);
        } else {

            $serviceUsersProfile = ServiceUsersProfile::findOrFail($serviceUserProfile);


            $this->vars = array_add($this->vars, 'user', $this->user);

            $this->vars = array_add($this->vars, 'carerProfile', $serviceUsersProfile);
            $this->vars = array_add($this->vars, 'serviceUsersProfile', $serviceUsersProfile);

            $typeCare = AssistanceType::all();
            $this->vars = array_add($this->vars, 'typeCare', $typeCare);
            $workingTimes = WorkingTime::all();
            $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
            $languages = Language::all();
            $this->vars = array_add($this->vars, 'languages', $languages);
            //dd($this->user,$carerProfile);
            $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.PublicProfile')->with($this->vars)->render();

        }

        return $this->renderOutput();
    }

//    public function booking($serviceUserProfile)
//    {
//        $user = Auth::user();
//
//        $this->template = config('settings.frontTheme') . '.templates.serviceUserPrivateProfileTemplate';
//        $this->title = 'Holm Care';
//
//        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
//        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
//        $modals = view(config('settings.frontTheme').'.includes.modals')->render();
//
//        $this->vars = array_add($this->vars,'header',$header);
//        $this->vars = array_add($this->vars,'footer',$footer);
//        $this->vars = array_add($this->vars,'modals',$modals);
//
//        $serviceUsersProfile = ServiceUsersProfile::findOrFail($serviceUserProfile);
//
//
//        $this->vars = array_add($this->vars, 'user', $this->user);
//
//        $this->vars = array_add($this->vars, 'serviceUsersProfile', $serviceUsersProfile);
//
//        $typeCare = AssistanceType::all();
//        $this->vars = array_add($this->vars, 'typeCare', $typeCare);
//        $workingTimes = WorkingTime::all();
//        $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
//        $languages = Language::all();
//        $this->vars = array_add($this->vars, 'languages', $languages);
//
//        $newBookings = Booking::where('status_id', 2)->where('purchaser_id', $user->id)->get();
//        $this->vars = array_add($this->vars, 'newBookings', $newBookings);
//
//        $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.Booking.BookingTaball')->with($this->vars)
//            ->render();
//
//
//        return $this->renderOutput();
//    }

    public function bookingFilter(ServiceUsersProfile $serviceUserProfile, $status = 'all')
    {
        $user = Auth::user();

        $this->template = config('settings.frontTheme') . '.templates.serviceUserPrivateProfileTemplate';
        $this->title = 'Holm Care';

        $header = view(config('settings.frontTheme').'.headers.baseHeader')->render();
        $footer = view(config('settings.frontTheme').'.footers.baseFooter')->render();
        $modals = view(config('settings.frontTheme').'.includes.modals')->render();

        $this->vars = array_add($this->vars,'header',$header);
        $this->vars = array_add($this->vars,'footer',$footer);
        $this->vars = array_add($this->vars,'modals',$modals);

        $serviceUsersProfile = ServiceUsersProfile::findOrFail($serviceUserProfile);


        $this->vars = array_add($this->vars, 'user', $this->user);
        $this->vars = array_add($this->vars, 'serviceUser', $serviceUserProfile);

        $this->vars = array_add($this->vars, 'serviceUsersProfile', $serviceUsersProfile);

        $typeCare = AssistanceType::all();
        $this->vars = array_add($this->vars, 'typeCare', $typeCare);
        $workingTimes = WorkingTime::all();
        $this->vars = array_add($this->vars, 'workingTimes', $workingTimes);
        $languages = Language::all();
        $this->vars = array_add($this->vars, 'languages', $languages);

        $this->vars = array_add($this->vars, 'status', $status);

        $newBookings = Booking::whereIn('status_id', [self::NEW, self::AWAITING_CONFIRMATION])->where('purchaser_id', $user->id)->where('service_user_id', $serviceUserProfile->id)->get();
        $this->vars = array_add($this->vars, 'newBookings', $newBookings);

        $inProgressBookings = Booking::where('status_id', 5)->where('purchaser_id', $user->id)->where('service_user_id', $serviceUserProfile->id)->get();
        $this->vars = array_add($this->vars, 'inProgressBookings', $inProgressBookings);

        $completedBookings = Booking::where('status_id', 7)->where('purchaser_id', $user->id)->where('service_user_id', $serviceUserProfile->id)->get();
        $this->vars = array_add($this->vars, 'completedBookings', $completedBookings);


        $this->content = view(config('settings.frontTheme') . '.serviceUserProfiles.Booking.BookingTaball')->with($this->vars)
            ->render();


        return $this->renderOutput();
    }
}
