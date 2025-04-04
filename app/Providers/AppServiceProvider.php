<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('programar-clase', function(User $user){
            return $user->rol === 'instructor';
        });
        Gate::define('reservar-clase', function(User $user){
            return $user->rol === 'miembro';
        });
    }
}
