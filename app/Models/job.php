<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Use the job_listings table instead of "jobs"
    protected $table = 'job_listings';

    // Each job belongs to one employer
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }
}
