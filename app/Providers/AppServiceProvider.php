<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Filament\Auth\MyLogoutResponse;
use Filament\Http\Responses\Auth\LogoutResponse;
// use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(LogoutResponse::class, MyLogoutResponse::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gate::policy(\Spatie\Permission\Models\Role::class, \App\Policies\RolePolicy::class);
    }
}
