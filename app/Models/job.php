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
                'salary' => '$45,000',
                'description' => 'Responsible for building responsive UI using HTML, CSS, JavaScript, and modern frameworks like React or Vue.'
            ],
            [
                'id' => 2,
                'title' => 'Backend Developer',
                'salary' => '$50,000',
                'description' => 'Works with databases, APIs, and server-side logic using PHP, Laravel, Node.js, or Python.'
            ],
            [
                'id' => 3,
                'title' => 'Full Stack Developer',
                'salary' => '$60,000',
                'description' => 'Handles both frontend and backend tasks, capable of building complete web applications from scratch.'
            ],
            [
                'id' => 4,
                'title' => 'DevOps Engineer',
                'salary' => '$55,000',
                'description' => 'Manages CI/CD pipelines, cloud deployments (AWS, Azure), and server automation to ensure smooth operations.'
            ],
            [
                'id' => 5,
                'title' => 'Data Analyst',
                'salary' => '$48,000',
                'description' => 'Analyzes data, builds reports, and uses tools like SQL, Excel, and Power BI to help businesses make data-driven decisions.'
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
