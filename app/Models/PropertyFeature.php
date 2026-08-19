<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'status',
        'created_by',
        'updated_by',
    ];

    public function properties()
    {
        return $this->belongsToMany(Property::class, 'feature_property');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }
}