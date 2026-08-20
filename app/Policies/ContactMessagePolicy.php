<?php

namespace App\Policies;

use App\Models\ContactMessage;
use App\Models\User;

class ContactMessagePolicy
{
    public function viewAny(User $user): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function view(User $user, ContactMessage $message): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    // ContactMessages are only created by visitors via the public form — no admin create
    public function create(User $user): bool
    {
        return false;
    }

    public function update(User $user, ContactMessage $message): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin', 'manager']);
    }

    public function delete(User $user, ContactMessage $message): bool
    {
        return in_array($user->role->slug, ['super_admin', 'admin']);
    }
}
