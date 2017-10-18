<?php

namespace App\Helpers;

use App\Helpers\Contracts\SaveStr;

class SaveEloquentOrm implements SaveStr
{
    public static function save(array $data)
    {
        $obj = new self;
        $data = $obj->checkData($data);
        die('SaveEloquentOrm');
    }

    public function checkData(array $data) : array
    {
        return $data;
    }


}