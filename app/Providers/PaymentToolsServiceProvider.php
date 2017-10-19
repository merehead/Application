<?php

namespace App\Providers;

use App\Helpers\StripePaymentTools;
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
        $this->app->singleton('paymenttools', function (){
            return new StripePaymentTools();
        });
    }
}
