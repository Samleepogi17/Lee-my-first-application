<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employer;
use App\Models\Job;
use App\Models\Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1️⃣ Create 10 random tags
        $tags = Tag::factory(10)->create();

        // 2️⃣ Create 5 employers, each with 3 jobs
        Employer::factory(5)
            ->has(
                Job::factory()
                    ->count(3) // 3 jobs per employer
            )
            ->create()
            ->each(function ($employer) use ($tags) {
                // 3️⃣ Attach 2 random tags to each job
                $employer->jobs->each(function ($job) use ($tags) {
                    $job->tags()->attach($tags->random(2));
                });
            });
    }
}
