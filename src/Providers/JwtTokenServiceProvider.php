<?php

namespace Webguosai\JwtToken\Providers;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Webguosai\JwtToken\Services\JwtToken;
use Webguosai\JwtToken\Services\Jwt;

class JwtTokenServiceProvider extends LaravelServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->singleton('Jwt', function ($app) {
            return new Jwt(env('JWT_SECRET'));
        });

        $this->app->singleton('JwtToken', function ($app) {
            return new JwtToken();
        });
    }
}
