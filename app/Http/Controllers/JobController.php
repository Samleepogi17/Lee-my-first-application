<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Tag;


class JobController extends Controller
{
    // Display paginated list of jobs
    public function index()
    {
        $jobs = Job::with('employer')->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    // Show form to create a new job
    public function create()
    {
        $job = new Job();
        return view('jobs.form', compact('job'));
    }

    // Store new job in database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric']
        ]);

        Job::create([
            'title' => $validated['title'],
            'salary' => $validated['salary'],
            'employer_id' => $request->user()->id ?? 1 // dynamically use logged-in user if applicable
        ]);

        return redirect()->route('jobs.index')->with('success', 'Job created successfully!');
    }

    // Show a single job
    public function show(Job $job)
    {
        return view('jobs.show', compact('job'));
    }

    // Show form to edit a job
    public function edit(Job $job)
    {
        return view('jobs.form', compact('job'));
    }

    // Update a job
    public function update(Request $request, Job $job)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required', 'numeric']
        ]);

        $job->update($validated);

        return redirect()->route('jobs.show', $job)->with('success', 'Job updated successfully!');
    }

    // Delete a job
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully!');
    }

    // Attach random tags to a job (for testing)
    public function attachTagsToJob($id = null)
    {
        $job = $id ? Job::find($id) : Job::first();

        if (!$job) {
            return response()->json(['message' => 'Job not found!'], 404);
        }

        $tagIds = Tag::inRandomOrder()->take(2)->pluck('id')->toArray();
        $job->tags()->sync($tagIds);

        return response()->json([
            'message' => "Tags attached successfully to Job ID {$job->id}!",
            'tags' => $job->tags
        ], 200);
    }
}
