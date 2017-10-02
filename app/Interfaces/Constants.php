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

    const APPOINTMENT_STATUS_NEW = 1;
    const APPOINTMENT_STATUS_IN_PROGRESS = 2;
    const APPOINTMENT_STATUS_DISPUTE = 3;
    const APPOINTMENT_STATUS_COMPLETED = 4;
    const APPOINTMENT_STATUS_CANCELLED = 5;
    const APPOINTMENT_STATUS_PAID = 6;

    const APPOINTMENT_USER_STATUS_NEW = 1;
    const APPOINTMENT_USER_STATUS_COMPLETED = 2;
    const APPOINTMENT_USER_STATUS_REJECTED = 3;
}