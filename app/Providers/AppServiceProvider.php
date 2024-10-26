<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $this->registerPolicies();
        // Gate untuk Admin
        Gate::define('is-admin', function (User $user) {
            return $user->level_id === 1;
        });

        // Gate untuk Warga
        Gate::define('is-user', function (User $user) {
            return $user->level_id === 2;
        });
    }
}
