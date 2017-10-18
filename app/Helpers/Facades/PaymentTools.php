<?php
namespace App\Helpers\Facades;

use Illuminate\Support\Facades\Facade;

class PaymentTools extends Facade
{
    protected static function getFacadeAccessor(){
        return 'paymenttools';
    }
}