<?php

namespace App\Providers;

use App\Models\Admin;
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
        Gate::define('admin', function(Admin $admin){
            return $admin->f_level == 'Admin';
        });

        Gate::define('pustakawan', function(Admin $admin){
            return $admin->f_level == 'Pustakawan';
        });
    }
}
