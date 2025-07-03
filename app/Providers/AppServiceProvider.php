<?php

namespace App\Providers;

use App\Models\Team;
use App\Models\User;
use App\Observers\PermissionObserver;
use App\Observers\TeamObserver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Permission;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Permission::observe(PermissionObserver::class);
        Team::observe(TeamObserver::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        \Spatie\Permission\Models\Permission::observe(\App\Observers\PermissionObserver::class);
        \App\Models\Team::observe(\App\Observers\TeamObserver::class);


        view()->composer('*', function ($view) {
            $view->with('authUser', Auth::user());
        });
    }
}
