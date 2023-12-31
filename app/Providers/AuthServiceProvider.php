<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Passport::ignoreRoutes();
        Passport::tokensExpireIn(now()->addMinutes(config('auth.token_expiration.token')));
        Passport::refreshTokensExpireIn(now()->addMinutes('auth.token_expiration.refresh_token'));

    }
}