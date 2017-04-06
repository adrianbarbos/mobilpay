<?php

namespace Adrianbarbos\Mobilpay;

use Illuminate\Support\ServiceProvider;

class MobilpayServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/mobilpay.php', 'mobilpay'
        );

        $this->publishes([
            __DIR__ . '/config' => config_path('/'),
        ]);

        $this->app->singleton('mobilpay',function ($app){
            return new MobilpayGateway();
        });
    }

    public function provides()
    {
        return ['mobilpay'];
    }
}
