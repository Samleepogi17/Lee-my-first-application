<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Home page
Route::get('/', fn() => view('home'))->name('home');

// Jobs resource routes (handles all CRUD actions: index, create, store, show, edit, update, destroy)
Route::resource('jobs', JobController::class);

// Optional extra route (e.g., attach tags for testing)
Route::get('/attach-tags/{job?}', [JobController::class, 'attachTagsToJob'])->name('jobs.attach-tags');
