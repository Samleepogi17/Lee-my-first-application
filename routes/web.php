<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home');
});

// All jobs (with employer eager-loaded)
Route::get('/jobs', function () {
    return view('jobs', [
        'jobs' => Job::with('employer')->get()
    ]);
});

// Single job (detail page)
Route::get('/jobs/{id}', function ($id) {
    return view('job', [
        'job' => Job::with('employer')->findOrFail($id)
    ]);
});
