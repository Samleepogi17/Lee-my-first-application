<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->jobTitle(),
            'salary' => '$' . $this->faker->numberBetween(40000, 80000),
            'employer_id' => \App\Models\Employer::factory(), // auto-create employer
        ];
    }
}
