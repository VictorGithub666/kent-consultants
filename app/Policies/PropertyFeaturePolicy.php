<?php

namespace App\Policies;

use App\Models\PropertyFeature;
use App\Models\User;

class PropertyFeaturePolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, PropertyFeature $feature): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function update(User $user, PropertyFeature $feature): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function delete(User $user, PropertyFeature $feature): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }
}
