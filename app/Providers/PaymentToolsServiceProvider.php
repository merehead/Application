<?php

namespace App\Providers;

use App\Helpers\SaveEloquentOrm;
use App\Helpers\SaveFile;
use Illuminate\Support\ServiceProvider;

class PaymentToolsServiceProvider extends ServiceProvider
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
        $this->app->singleton('savestr', function (){
            return new SaveEloquentOrm();
//            return new SaveFile();
        });
    }
}
