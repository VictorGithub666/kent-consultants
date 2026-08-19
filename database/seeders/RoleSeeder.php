<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            ['name' => 'Super Admin', 'slug' => 'super_admin', 'description' => 'Full system access'],
            ['name' => 'Admin', 'slug' => 'admin', 'description' => 'Can manage everything except super admins'],
            ['name' => 'Manager', 'slug' => 'manager', 'description' => 'Can manage operational content'],
            ['name' => 'User', 'slug' => 'user', 'description' => 'Limited access to own content'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}