<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'career_id',
        'applicant_name',
        'email',
        'phone',
        'cover_letter',
        'cv_path',
        'status',
    ];

    public function career()
    {
        return $this->belongsTo(Career::class);
    }
}