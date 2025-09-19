<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Home page
Route::get('/', function () {
    return view('home');
});

// All jobs (listing page)
Route::get('/jobs', [JobController::class, 'index']);

// Single job (detail page)
Route::get('/jobs/{id}', [JobController::class, 'show']);

// Attach tags to a job (for testing)
// Optional {id} parameter, defaults to 1 in controller
Route::get('/attach-tags/{id?}', [JobController::class, 'attachTagsToJob']);
