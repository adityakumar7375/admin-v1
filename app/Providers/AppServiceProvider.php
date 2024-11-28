<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\ApiService;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Bind the ApiService to the container
        $this->app->singleton(ApiService::class, function ($app) {
            return new ApiService();
        });
    }

    public function boot()
    {
        //
    }
}