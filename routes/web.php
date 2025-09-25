<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Jobs listing page with search functionality
Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');

// Show create job form
Route::get('/jobs/create', [JobController::class, 'create'])->name('jobs.create');

// Store new job (POST)
Route::post('/jobs', [JobController::class, 'store'])->name('jobs.store');

// Single job (detail page) using route model binding
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');

// Show edit job form
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');

// Update job (PATCH)
Route::patch('/jobs/{job}', [JobController::class, 'update'])->name('jobs.update');

// Delete job (DELETE)
Route::delete('/jobs/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');

// Attach tags to a job (for testing)
Route::get('/attach-tags/{job?}', [JobController::class, 'attachTagsToJob'])->name('jobs.attach-tags');
