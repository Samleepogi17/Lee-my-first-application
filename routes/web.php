<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// All jobs (listing page)
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

// Single job (detail page)
Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');

// Attach tags to a job (for testing)
Route::get('/attach-tags/{id?}', [JobController::class, 'attachTagsToJob'])->name('jobs.attach-tags');
