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
    //

    public function getProfileType (){
        return ['1'=>'Purchaser','2'=>'Service','3'=>'Carer','4'=>'Admin'];
    }
    public function getStatusType (){
        return ['1'=>'New','2'=>'Active','3'=>'Rejected','4'=>'Edited','5'=>'Blocked'];
    }
    public function getTotals (){
        return ['New'=>'12','Active'=>'345','Rejected'=>'6','Edited'=>'8','Blocked'=>'45'];
    }




}