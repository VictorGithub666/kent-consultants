<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Role::all()->pluck('id', 'slug');

        // Super Admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@kentconsultantsltd.co.ke',
            'password' => Hash::make('password123'),
            'role_id' => $roles['super_admin'],
            'phone' => '+254 700 000 000',
            'status' => true,
        ]);

        // Admin
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@kentconsultantsltd.co.ke',
            'password' => Hash::make('password123'),
            'role_id' => $roles['admin'],
            'phone' => '+254 700 000 001',
            'status' => true,
        ]);

        // Manager
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@kentconsultantsltd.co.ke',
            'password' => Hash::make('password123'),
            'role_id' => $roles['manager'],
            'phone' => '+254 700 000 002',
            'status' => true,
        ]);

        // Regular User
        User::create([
            'name' => 'Regular User',
            'email' => 'user@kentconsultantsltd.co.ke',
            'password' => Hash::make('password123'),
            'role_id' => $roles['user'],
            'phone' => '+254 700 000 003',
            'status' => true,
        ]);
    }
}