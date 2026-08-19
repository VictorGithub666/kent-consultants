<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Career extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'slug',
        'department',
        'location',
        'employment_type',
        'description',
        'responsibilities',
        'requirements',
        'application_deadline',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'application_deadline' => 'date',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($career) {
            $career->slug = Str::slug($career->job_title . '-' . uniqid());
        });
    }

    public function applications()
    {
        return $this->hasMany(CareerApplication::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'published')
            ->where('application_deadline', '>=', now());
    }
}