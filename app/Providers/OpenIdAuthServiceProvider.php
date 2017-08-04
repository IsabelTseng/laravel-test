<?php

namespace App\Providers;

use App\Ylc\Auth\YlcOpenId;
use Illuminate\Support\ServiceProvider;

class OpenIdAuthServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(YlcOpenId::class, function () {
            $config = config('ylc-auth');
            $openid = new YlcOpenId($config['host']);

            $openid->setIdentity($config['identity']);
            $openid->setRequired($config['fields']);

            return $openid;
        });
    }

    public function provides()
    {
        return [
            \Ylc\Auth\YlcOpenId::class
        ];
    }
}
