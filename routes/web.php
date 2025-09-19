<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Homepage
Route::get('/', function () {
    return view('home');
});

// All Jobs - using the Job model + search filter
Route::get('/jobs', function () {
    $search = request('search'); // Get search query from ?search=...

    $jobs = Job::all();

    if ($search) {
        $jobs = array_filter($jobs, function ($job) use ($search) {
            return stripos($job['title'], $search) !== false;
        });
    }

    return view('jobs', [
        'jobs' => $jobs,
        'search' => $search
    ]);
});

// Single Job - Route Wildcard using the Job model
Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::find($id)
    ]);
});
