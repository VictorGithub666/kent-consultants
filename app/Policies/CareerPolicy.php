<?php
// app/Policies/CareerPolicy.php

namespace App\Policies;

use App\Models\User;
use App\Models\Career;

class CareerPolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function view(User $user, Career $career): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function create(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function update(User $user, Career $career): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function delete(User $user, Career $career): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }
}