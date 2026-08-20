<?php
// app/Models/User.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'phone',
        'profile_photo',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'created_by');
    }

    public function createdProperties()
    {
        return $this->hasMany(Property::class, 'created_by');
    }

    public function updatedProperties()
    {
        return $this->hasMany(Property::class, 'updated_by');
    }

    public function hasRole($roleName): bool
    {
        return $this->role && $this->role->slug === $roleName;
    }

    public function isSuperAdmin(): bool
    {
        return $this->hasRole('super_admin');
    }

    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    public function isManager(): bool
    {
        return $this->hasRole('manager');
    }

    public function isUser(): bool
    {
        return $this->hasRole('user');
    }

    public function canManageSuperAdmins(): bool
    {
        return $this->isSuperAdmin();
    }

    public function canManageAdmins(): bool
    {
        return $this->isSuperAdmin() || $this->isAdmin();
    }

    // Add this accessor for default avatar URL
    public function getAvatarUrlAttribute()
    {
        if ($this->profile_photo) {
            return asset('storage/' . $this->profile_photo);
        }
        return asset('images/default-avatar.png');
    }
}