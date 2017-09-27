<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'profile-photo',
        'service-user-profile-photo',
        'welcome-carer',
        'carer-registration',
        'purchaser-registration',
        'purchaser-settings',
        'carer-settings',
        'bookings',
        'bookings/*',
    ];
}
