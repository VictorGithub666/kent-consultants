<?php
// app/Providers/AuthServiceProvider.php

namespace App\Providers;

use App\Models\Career;
use App\Models\CareerApplication;
use App\Models\ContactMessage;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\PropertyFeature;
use App\Models\User;
use App\Policies\CareerApplicationPolicy;
use App\Policies\CareerPolicy;
use App\Policies\ContactMessagePolicy;
use App\Policies\PropertyCategoryPolicy;
use App\Policies\PropertyFeaturePolicy;
use App\Policies\PropertyPolicy;
use App\Policies\UserPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Property::class          => PropertyPolicy::class,
        User::class              => UserPolicy::class,
        Career::class            => CareerPolicy::class,
        PropertyCategory::class  => PropertyCategoryPolicy::class,
        PropertyFeature::class   => PropertyFeaturePolicy::class,
        ContactMessage::class    => ContactMessagePolicy::class,
        CareerApplication::class => CareerApplicationPolicy::class,
    ];

    public function boot(): void
    {
        // Admin access gate
        Gate::define('access-admin', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin', 'manager', 'user']);
        });

        // Super Admin management
        Gate::define('manage-super-admins', function (User $user) {
            return $user->isSuperAdmin();
        });

        // Admin management
        Gate::define('manage-admins', function (User $user) {
            return $user->isSuperAdmin() || $user->isAdmin();
        });

        // Manager management
        Gate::define('manage-managers', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin']);
        });

        // Property management
        Gate::define('manage-properties', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin', 'manager', 'user']);
        });

        // Website settings - Super Admin only
        Gate::define('manage-website-settings', function (User $user) {
            return $user->isSuperAdmin();
        });

        // Career management
        Gate::define('manage-careers', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
        });

        // Message management
        Gate::define('manage-messages', function (User $user) {
            return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
        });
    }
}
