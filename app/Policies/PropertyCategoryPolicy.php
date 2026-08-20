<?php
// app/Policies/PropertyCategoryPolicy.php

namespace App\Policies;

use App\Models\User;
use App\Models\PropertyCategory;

class PropertyCategoryPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, PropertyCategory $category): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function update(User $user, PropertyCategory $category): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function delete(User $user, PropertyCategory $category): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }
}