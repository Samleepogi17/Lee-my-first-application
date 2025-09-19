<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 5 employers, each with 3 jobs
        Employer::factory()
            ->count(5)
            ->has(Job::factory()->count(3))
            ->create();
    }
}
