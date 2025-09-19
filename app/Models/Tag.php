<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // A tag can belong to many jobs
    public function jobs()
    {
        return $this->belongsToMany(
            \App\Models\Job::class,
            'job_listing_tag',   // pivot table name
            'tag_id',            // foreign key for Tag in pivot
            'job_listing_id'     // foreign key for Job in pivot
        );
    }
}
