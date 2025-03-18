<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use app\Models\User;

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
        Gate::define('access-admin-dashbord', function(User $user){
           return $user->role === 'admin';
        });
        Gate::define('access-user-dashbord', function(User $user){
           return $user->role === 'user';
        });
    }
}
