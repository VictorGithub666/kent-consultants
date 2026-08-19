<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'location',
        'description',
        'acquisition_type',
        'category_id',
        'bedrooms',
        'bathrooms',
        'floor_area',
        'land_area',
        'car_parking',
        'price',
        'currency',
        'rent_frequency',
        'status',
        'main_image',
        'created_by',
        'updated_by',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($property) {
            $property->slug = Str::slug($property->name . '-' . uniqid());
        });
    }

    public function category()
    {
        return $this->belongsTo(PropertyCategory::class, 'category_id');
    }

    public function images()
    {
        return $this->hasMany(PropertyImage::class)->orderBy('order');
    }

    public function features()
    {
        return $this->belongsToMany(PropertyFeature::class, 'feature_property');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function isVacant(): bool
    {
        return $this->status === 'vacant';
    }

    public function isOccupied(): bool
    {
        return $this->status === 'occupied';
    }

    public function scopeVacant($query)
    {
        return $query->where('status', 'vacant');
    }

    public function scopeOccupied($query)
    {
        return $query->where('status', 'occupied');
    }

    public function scopeForRent($query)
    {
        return $query->where('acquisition_type', 'renting');
    }

    public function scopeForSale($query)
    {
        return $query->where('acquisition_type', 'buying');
    }
}