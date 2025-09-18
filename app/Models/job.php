<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    // Return all jobs
    public static function all()
    {
        return [
            [
                'id' => 1,
                'title' => 'Frontend Developer',
                'salary' => '$45,000'
            ],
            [
                'id' => 2,
                'title' => 'Backend Developer',
                'salary' => '$50,000'
            ],
            [
                'id' => 3,
                'title' => 'Full Stack Developer',
                'salary' => '$60,000'
            ],
            [
                'id' => 4,
                'title' => 'DevOps Engineer',
                'salary' => '$55,000'
            ],
            [
                'id' => 5,
                'title' => 'Data Analyst',
                'salary' => '$48,000'
            ]
        ];
    }

    // Find a job by ID
    public static function find($id)
    {
        $job = Arr::first(static::all(), fn($job) => $job['id'] == $id);

        if (! $job) {
            abort(404); // Show 404 if job not found
        }

        return $job;
    }
}
