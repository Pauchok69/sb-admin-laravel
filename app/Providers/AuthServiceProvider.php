<?php

namespace App\Providers;

use App\Role;
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
            'charts.view', function ($role) {
            return Auth::user()->role == Role::where('name', 'admin')->first();
        }
        );
        Gate::define(
            'tables.view', function () {
            return Auth::user()->role == Role::where('name', 'admin')->first();
        }
        );
    }
}
