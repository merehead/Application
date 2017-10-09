<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserStatus extends Model
{
    public function getCssAdminAttribute(){

        switch ($this->name) {
            case 'New':$rowClass = 'new';break;
            case 'Active':$rowClass = 'active';break;
            case 'Rejected':$rowClass = 'edit';break;
            case 'Edited':$rowClass = 'canceled';break;
            case 'Blocked':$rowClass = 'canceled';break;
            default :$rowClass='';
        }

        return $rowClass;
    }
}
