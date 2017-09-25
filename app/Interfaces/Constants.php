<?php
/**
 * Created by PhpStorm.
 * User: andrii
 * Date: 22.09.17
 * Time: 17:09
 */

namespace App\Interfaces;


interface Constants
{
    const NEW = 1;
    const AWAITING_CONFIRMATION = 2;
    const CONFIRMED = 3;
    const CANCELLED = 4;
    const IN_PROGRESS = 5;
    const DISPUTE = 6;
    const COMPLETED = 7;
    const PAID = 8;
    const DELAYED = 9;
}