<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function isSuperAdmin(): bool
    {
        return $this->slug === 'super_admin';
    }

    public function isAdmin(): bool
    {
        return $this->slug === 'admin';
    }

    public function isManager(): bool
    {
        return $this->slug === 'manager';
    }

    public function isUser(): bool
    {
        return $this->slug === 'user';
    }
}