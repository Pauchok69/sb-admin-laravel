<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define(
            'charts.view', function (User $user) {
            return !$user->isManager() && !$user->isUser();
        }
        );
        Gate::define(
            'tables.view', function (User $user) {
            return !$user->isAdmin() && !$user->isUser();
        }
        );
        Gate::define(
            'dashboard.view', function (User $user) {
            return !$user->isManager() && !$user->isUser();
        }
        );
        Gate::define(
            'components.view', function (User $user) {
            return !$user->isManager();
        }
        );
        Gate::define(
            'mapMarker.create', function (User $user) {
            return !$user->isManager() && !$user->isUser();
        }
        );
    }
}
