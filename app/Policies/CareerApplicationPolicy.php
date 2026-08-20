<?php

namespace App\Policies;

use App\Models\CareerApplication;
use App\Models\User;

class CareerApplicationPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function view(User $user, CareerApplication $application): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    // Applications are submitted by public users — no admin create
    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, CareerApplication $application): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function delete(User $user, CareerApplication $application): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin']);
    }
}
