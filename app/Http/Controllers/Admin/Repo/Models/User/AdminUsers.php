<?php
/**
 * Created by PhpStorm.
 * User: pc5
 * Date: 08.08.17
 * Time: 12:42
 */

namespace App\Http\Controllers\Admin\Repo\Models\User;


use App\CarersProfile;
use App\Http\Controllers\Admin\Repo\Models\AdminModel;
use App\PurchasersProfile;
use App\ServiceUsersProfile;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\DB;

class AdminUsers extends AdminModel
{
    public function __construct(User $users) {
        $this->model = $users;
    }
    public function viewUserList()
    {
        return;
    }
    public function viewUser()
    {
        return;
    }




    // заглушки

    // как бы справочник типов профилей
    public function getProfileType (){

        $profileType = UserType::all()->toArray();

        //var_dump($profileType);

        return ['purchaser'=>'Purchaser','service'=>'Service user','carer'=>'Carer'];

    }

    // как бы справочник статусов
    public function getStatusType (){
        return ['1'=>'New','2'=>'Active','3'=>'Rejected','4'=>'Edited','5'=>'Blocked'];
    }

    // подсчет сумарных данных по зарегистрированным пользователям
    public function getTotals ($totalsByUserType) : array
    {

        $result = array();

        $result['New'] = $totalsByUserType->sum('New');
        $result['Active'] = $totalsByUserType->sum('Active');
        $result['Rejected'] = $totalsByUserType->sum('Rejected');
        $result['Edited'] = $totalsByUserType->sum('Edited');
        $result['Blocked'] = $totalsByUserType->sum('Blocked');


        return $result;
    }

    //подсчет сумарных данных по зарегистрированным пользователям в разрезе типов пользователей
    public function getTotalsByUserType (){

        $userByType = array();

        $result  = DB::select("select `profiles_status_id`, count(*) as profiles_count from `purchasers_profiles` group by `profiles_status_id`");
        if ($result) {
            $userByType['purchaser']=['type'=>'purchaser'];
            foreach ($result as $value) {
                switch ($value->profiles_status_id){
                    case 1 : $userByType['purchaser']['New'] = $value->profiles_count; break;
                    case 2 : $userByType['purchaser']['Active'] = $value->profiles_count; break;
                    case 3 : $userByType['purchaser']['Rejected'] = $value->profiles_count; break;
                    case 4 : $userByType['purchaser']['Edited'] = $value->profiles_count; break;
                    case 5 : $userByType['purchaser']['Blocked'] = $value->profiles_count; break;
                }
            }
        }
        $result  = DB::select("select `profiles_status_id`, count(*) as profiles_count from `carers_profiles` group by `profiles_status_id`");
        if ($result) {
            $userByType['carer']=['type'=>'carer'];
            foreach ($result as $value) {
                switch ($value->profiles_status_id){
                    case 1 : $userByType['carer']['New'] = $value->profiles_count; break;
                    case 2 : $userByType['carer']['Active'] = $value->profiles_count; break;
                    case 3 : $userByType['carer']['Rejected'] = $value->profiles_count; break;
                    case 4 : $userByType['carer']['Edited'] = $value->profiles_count; break;
                    case 5 : $userByType['carer']['Blocked'] = $value->profiles_count; break;
                }
            }
        }
        $result  = DB::select("select `profiles_status_id`, count(*) as profiles_count from `service_users_profiles` group by `profiles_status_id`");
        if ($result) {
            $userByType['service']=['type'=>'purchaser'];
            foreach ($result as $value) {
                switch ($value->profiles_status_id){
                    case 1 : $userByType['service']['New'] = $value->profiles_count; break;
                    case 2 : $userByType['service']['Active'] = $value->profiles_count; break;
                    case 3 : $userByType['service']['Rejected'] = $value->profiles_count; break;
                    case 4 : $userByType['service']['Edited'] = $value->profiles_count; break;
                    case 5 : $userByType['service']['Blocked'] = $value->profiles_count; break;
                }
            }
        }

        return collect($userByType);
    }

    // выборка профилей пользователей из всех таблиц профилей для админки Профиля менеджеров
    public function getUserList($profileTypeFilter,$statusTypeFilter){


        if (empty($profileTypeFilter)) {
            $profileList = CarersProfile::all(['id', 'first_name', 'family_name', 'registration_status', 'profiles_status_id'])
                ->merge(PurchasersProfile::all(['id', 'first_name', 'family_name', 'registration_status', 'profiles_status_id']))
                ->sortByDesc('id')
                ->slice(0, 40);

            $userProfileList = collect();

            foreach ($profileList as $user) {
                $userProfileList->push($user);
                if ($user instanceof PurchasersProfile && count($user->serviceUsers)) {
                    foreach ($user->serviceUsers as $serviceUser) {
                        $serviceUserProfile = ServiceUsersProfile::find($serviceUser->id, ['id', 'first_name', 'family_name', 'registration_status', 'profiles_status_id',
                            'visit_for_companionship', 'start_date', 'assistance_with_eating', 'choosing_incontinence_products', 'consent', 'time_to_bed', 'keeping_safe_at_night', 'multiple_carers', 'we_missed']);
                        $userProfileList->push($serviceUserProfile);
                    }
                }
            }
        } else {
            switch ($profileTypeFilter) {
                case 'purchaser' : $userProfileList=PurchasersProfile::all(['id', 'first_name', 'family_name', 'registration_status', 'profiles_status_id'])
                    ->sortByDesc('id')
                    ->slice(0, 40); break;
                case 'carer' : $userProfileList=CarersProfile::all(['id', 'first_name', 'family_name', 'registration_status', 'profiles_status_id'])
                    ->sortByDesc('id')
                    ->slice(0, 40);break;
                case 'service' : $userProfileList=ServiceUsersProfile::all(['id', 'first_name', 'family_name', 'registration_status', 'profiles_status_id',
                    'visit_for_companionship', 'start_date', 'assistance_with_eating', 'choosing_incontinence_products', 'consent', 'time_to_bed', 'keeping_safe_at_night', 'multiple_carers', 'we_missed'])
                    ->sortByDesc('id')
                    ->slice(0, 40);
            }
        }


        //$filtered = $collection->where('price', 100);  profiles_status_id

        if (!empty($statusTypeFilter))
            $userProfileList = $userProfileList->where('profiles_status_id',$statusTypeFilter);


        //dd($userProfileList);
        return $userProfileList;
    }

}