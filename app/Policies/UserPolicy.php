<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin']);
    }

    public function view(User $user, User $targetUser): bool
    {
        if ($user->isSuperAdmin()) {
            return true;
        }

        if ($user->isAdmin()) {
            return !$targetUser->isSuperAdmin();
        }

        return $user->id === $targetUser->id;
    }

    public function create(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin']);
    }

    public function update(User $user, User $targetUser): bool
    {
        // Super Admin can update anyone
        if ($user->isSuperAdmin()) {
            return true;
        }

        // Admin can update non-Super Admin users
        if ($user->isAdmin()) {
            return !$targetUser->isSuperAdmin();
        }

        // Users can update their own profile
        return $user->id === $targetUser->id;
    }

    public function delete(User $user, User $targetUser): bool
    {
        // Super Admin can delete anyone
        if ($user->isSuperAdmin()) {
            return true;
        }

        // Admin can delete non-Super Admin users
        if ($user->isAdmin()) {
            return !$targetUser->isSuperAdmin();
        }

        return false;
    }

    public function manageRoles(User $user): bool
    {
        return $user->isSuperAdmin() || $user->isAdmin();
    }
}