<?php

namespace App\Policies;

use App\ServiceUsersProfile;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceUsersProfilePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function see(User $user, ServiceUsersProfile $profile)
    {
        switch ($user->user_type_id){
            //$user is Purchaser
            case 1:
                //If Purchaser is owner of ServiceUser
                return $profile->purchaser_id == $user->id;
                break;
            //$user is Carer
            case 3:
                //If Carer has bookings from ServiceUser
                return $user->hasBookingsWith($profile);
                break;

            case 4:
                //User is Admin
                return true;
        }
    }
}
