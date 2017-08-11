<?php
/**
 * Created by PhpStorm.
 * User: pc5
 * Date: 08.08.17
 * Time: 12:42
 */

namespace App\Http\Controllers\Admin\Repo\Models\User;


use App\Http\Controllers\Admin\Repo\Models\AdminModel;
use App\User;

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
        return ['1'=>'Purchaser','2'=>'Serves user','3'=>'Carer'];
    }

    // как бы справочник статусов
    public function getStatusType (){
        return ['1'=>'New','2'=>'Active','3'=>'Rejected','4'=>'Edited','5'=>'Blocked'];
    }

    // как бы подсчет сумарных данных по зарегистрированным пользователям
    public function getTotals (){
        return ['New'=>'12','Active'=>'345','Rejected'=>'6','Edited'=>'8','Blocked'=>'45'];
    }

    // как бы подсчет сумарных данных по зарегистрированным пользователям в разрезе типов пользователей
    public function getTotalsByUserType (){

        $userByType['purchaser'] = ['type'=>'purchaser','New'=>'2','Active'=>'145','Rejected'=>'1','Edited'=>'3','Blocked'=>'15'];
        $userByType['service']    = ['type'=>'service','New'=>'7','Active'=>'150','Rejected'=>'3','Edited'=>'4','Blocked'=>'15'];
        $userByType['carer']      = ['type'=>'carer','New'=>'3','Active'=>'50','Rejected'=>'2','Edited'=>'1','Blocked'=>'15'];

        return collect($userByType);
    }

    // как бы выборка данных из таблицы пользователей для админки Профиля менеджеров
    public function getUserList(){

        $user[1] = ['id'=>1,'name'=>'chris','userType'=>'purchaser','userStatus'=>'NEW','nta'=>1];
        $user[2] = ['id'=>2,'name'=>'john','userType'=>'service','userStatus'=>'NEW','nta'=>45];
        $user[3] = ['id'=>3,'name'=>'stan','userType'=>'purchaser','userStatus'=>'ACTIVE','nta'=>65];
        $user[4] = ['id'=>4,'name'=>'bob','userType'=>'carer','userStatus'=>'CANCELED','nta'=>5];
        $user[5] = ['id'=>5,'name'=>'ruby','userType'=>'purchaser','userStatus'=>'ACTIVE','nta'=>45];
        $user[6] = ['id'=>6,'name'=>'salomon','userType'=>'service','userStatus'=>'EDITED','nta'=>00];
        $user[7] = ['id'=>7,'name'=>'jacky','userType'=>'purchaser','userStatus'=>'ACTIVE','nta'=>1];
        $user[8] = ['id'=>8,'name'=>'merry','userType'=>'carer','userStatus'=>'ACTIVE','nta'=>5];
        $user[9] = ['id'=>9,'name'=>'ann','userType'=>'purchaser','userStatus'=>'ACTIVE','nta'=>7];
        $user[10] = ['id'=>10,'name'=>'robinson','userType'=>'service','userStatus'=>'EDITED','nta'=>45];
        $user[11] = ['id'=>11,'name'=>'stafford','userType'=>'carer','userStatus'=>'CANCELED','nta'=>56];
        $user[12] = ['id'=>12,'name'=>'anderson','userType'=>'purchaser','userStatus'=>'ACTIVE','nta'=>11];
        $user[13] = ['id'=>13,'name'=>'vasya','userType'=>'service','userStatus'=>'ACTIVE','nta'=>44];

        return collect($user);
    }




}