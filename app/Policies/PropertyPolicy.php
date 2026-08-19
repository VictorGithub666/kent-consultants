<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;

class PropertyPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Property $property): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager', 'user']);
    }

    public function update(User $user, Property $property): bool
    {
        // Super Admin and Admin can update any property
        if (in_array($user->role->slug, ['super_admin', 'admin'])) {
            return true;
        }

        // Manager can update any property
        if ($user->role->slug === 'manager') {
            return true;
        }

        // User can only update their own properties
        return $user->id === $property->created_by;
    }

    public function delete(User $user, Property $property): bool
    {
        // Super Admin and Admin can delete any property
        if (in_array($user->role->slug, ['super_admin', 'admin'])) {
            return true;
        }

        // Manager can delete any property
        if ($user->role->slug === 'manager') {
            return true;
        }

        // Users cannot delete properties
        return false;
    }

    public function changeStatus(User $user, Property $property): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }
}