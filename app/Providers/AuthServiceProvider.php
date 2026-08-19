<?php

namespace App\Providers;

use App\Models\Property;
use App\Models\User;
use App\Policies\PropertyPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Property::class => PropertyPolicy::class,
        User::class => UserPolicy::class,
    ];

    public function boot(): void
    {
        Gate::define('access-admin', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
        });

        Gate::define('manage-super-admins', function (User $user) {
            return $user->isSuperAdmin();
        });

        Gate::define('manage-admins', function (User $user) {
            return $user->isSuperAdmin() || $user->isAdmin();
        });

        Gate::define('manage-managers', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin']);
        });

        Gate::define('manage-properties', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin', 'manager', 'user']);
        });
    }
}