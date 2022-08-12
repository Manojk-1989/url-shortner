<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\UrlManagerInterface;
use App\Repository\UrlManagerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UrlManagerInterface::class, UrlManagerRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
