<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Use the job_listings table instead of default "jobs"
    protected $table = 'job_listings';

    // Mass assignable fields
    protected $fillable = [
        'title',
        'salary',
        'employer_id',
    ];

    // Cast salary to float automatically
    protected $casts = [
        'salary' => 'float',
    ];

    // Each job belongs to one employer
    public function employer()
    {
        return $this->belongsTo(\App\Models\Employer::class);
    }

    // Many-to-many relationship with tags
    public function tags()
    {
        return $this->belongsToMany(
            \App\Models\Tag::class,
            'job_listing_tag',    // pivot table name
            'job_listing_id',     // foreign key for Job in pivot
            'tag_id'              // foreign key for Tag in pivot
        );
    }
}
