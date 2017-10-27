<?php

namespace App\Providers;

use App\Helpers\MessenteSmsTools;
use Illuminate\Support\ServiceProvider;

class SmsToolsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('smstools', function (){
            return new MessenteSmsTools();
        });
    }
}
