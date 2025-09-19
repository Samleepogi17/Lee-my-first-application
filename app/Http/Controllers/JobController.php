<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
    /**
     * Display a list of all jobs with their employers and tags.
     */
    public function index()
    {
        // Eager-load employer and tags relationships
        $jobs = Job::with('employer', 'tags')->get();

        return view('jobs', [
            'jobs' => $jobs
        ]);
    }

    /**
     * Display a single job's details with employer and tags.
     */
    public function show($id)
    {
        $job = Job::with('employer', 'tags')->findOrFail($id);

        return view('job', [
            'job' => $job
        ]);
    }

    /**
     * Attach tags to a job (example/test method).
     */
    public function attachTagsToJob($id = 1)
    {
        $job = Job::find($id);

        if (!$job) {
            return "Job not found!";
        }

        // Example tag IDs to attach; replace with dynamic IDs if needed
        $tagIds = [1, 2, 3];
        $job->tags()->sync($tagIds);

        return "Tags attached successfully to Job ID {$id}!";
    }
}
