<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(\App\Repositories\CollectionsRepositoryInterface::class,
            \App\Repositories\CollectionsRepository::class);
        $this->app->bind(\App\Services\CollectionsServiceInterface::class,
            \App\Services\CollectionsService::class);
        $this->app->bind(\App\Repositories\ContributorsRepositoryInterface::class,
            \App\Repositories\ContributorsRepository::class);
        $this->app->bind(\App\Services\ContributorsServiceInterface::class,
            \App\Services\ContributorsService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
