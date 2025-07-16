<?php

namespace App\Providers;

use App\Models\Customer;
use App\Models\User;
use App\Observers\CustomerObserver;
use App\Services\MyLogger;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind('myservice', function ($app) {
            return new \App\Services\MyService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Paginator::useBootstrap();
        Customer::observe(CustomerObserver::class);
    }
}
