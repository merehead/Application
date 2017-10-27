<?php
namespace App\Helpers\Facades;

use Illuminate\Support\Facades\Facade;

class SmsTools extends Facade
{
    protected static function getFacadeAccessor(){
        return 'smstools';
    }
}