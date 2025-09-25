<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
    /**
     * Display a paginated list of all jobs with their employers and tags.
     * Supports optional search by job title.
     */
    public function index(Request $request)
    {
        $query = Job::with(['employer', 'tags']);

        // Optional search filter
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('title', 'like', "%{$search}%");
        }

        $jobs = $query->paginate(10)->withQueryString(); // keeps search query on pagination

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Display a single job's details with employer and tags.
     */
    public function show($id)
    {
        $job = Job::with(['employer', 'tags'])->findOrFail($id);

        return view('jobs.show', compact('job'));
    }

    /**
     * Attach random tags to a job (for testing purposes).
     */
    public function attachTagsToJob($id = null)
    {
        // Use given ID or first job
        $job = $id ? Job::find($id) : Job::first();

        if (!$job) {
            return response("Job not found!", 404);
        }

        // Attach 2 random tags dynamically
        $tagIds = Tag::inRandomOrder()->take(2)->pluck('id');
        $job->tags()->sync($tagIds);

        return response("Tags attached successfully to Job ID {$job->id}!", 200);
    }
}
