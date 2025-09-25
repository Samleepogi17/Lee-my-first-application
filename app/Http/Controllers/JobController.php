<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;

class JobController extends Controller
{
    /**
     * Display a paginated list of all jobs with their employers and tags.
     * Supports searching by job title or employer name via ?search= keyword.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $jobs = Job::with(['employer', 'tags'])
            ->when($search, function ($query, $search) {
                $query->where('title', 'like', "%{$search}%")
                      ->orWhereHas('employer', function ($q) use ($search) {
                          $q->where('name', 'like', "%{$search}%");
                      });
            })
            ->paginate(10)
            ->withQueryString(); // keeps the search term in pagination links

        return view('jobs.index', compact('jobs', 'search'));
    }

    /**
     * Show the form to create a new job.
     */
    public function create()
    {
        $job = new Job(); // empty job instance for the form
        return view('jobs.form', compact('job'));
    }

    /**
     * Store a new job in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric'],
        ]);

        Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'employer_id' => 1, // hardcoded for now, replace with real employer as needed
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    /**
     * Display a single job's details.
     */
    public function show(Job $job)
    {
        $job->load(['employer', 'tags']);
        return view('jobs.show', compact('job'));
    }

    /**
     * Show the form to edit an existing job.
     */
    public function edit(Job $job)
    {
        return view('jobs.form', compact('job'));
    }

    /**
     * Update a job in the database.
     */
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric'],
        ]);

        $job->update($validated); // safe update

        return redirect()->route('jobs.show', $job)->with('success', 'Job updated successfully!');
    }

    /**
     * Delete a job from the database.
     */
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    /**
     * Attach random tags to a job (for testing purposes).
     */
    public function attachTagsToJob($id = null)
    {
        $job = $id ? Job::find($id) : Job::first();

        if (!$job) {
            return response("Job not found!", 404);
        }

        $tagIds = Tag::inRandomOrder()->take(2)->pluck('id');
        $job->tags()->sync($tagIds);

        return response("Tags attached successfully to Job ID {$job->id}!", 200);
    }
}
