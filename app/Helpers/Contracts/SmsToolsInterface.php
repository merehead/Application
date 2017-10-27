<?php
namespace App\Helpers\Contracts;

use App\CarersProfile;
use App\ServiceUsersProfile;

interface SmsToolsInterface
{
    public function send(string $text, string $to) : string;
    public function sendSmsToCarer(string $text, CarersProfile $carersProfile);
    public function sendSmsToServiceUser(string $text, ServiceUsersProfile $serviceUsersProfile);
}