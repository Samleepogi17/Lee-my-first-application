<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="bg-white rounded-lg shadow p-6">
        <!-- Employer -->
        <div class="mb-4">
            <h2 class="text-blue-500 font-bold text-sm">Employer</h2>
            <p class="text-gray-700">{{ $job->employer->name ?? 'No Employer' }}</p>
        </div>

        <!-- Job Title & Salary -->
        <div class="mb-4">
            <h2 class="text-lg font-semibold">{{ $job->title }}</h2>
            <p class="text-gray-600">
                Salary: ${{ number_format($job->salary) }} per year
            </p>
        </div>

        <!-- Job Description -->
        <div class="mb-4">
            <h3 class="font-semibold">Job Description</h3>
            <p class="text-gray-700">{{ $job->description ?? 'No description provided.' }}</p>
        </div>

        <!-- Tags -->
        <div class="mb-4">
            <h3 class="font-semibold">Tags</h3>
            @forelse($job->tags as $tag)
                <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                    {{ $tag->name }}
                </span>
            @empty
                <span class="text-gray-400 text-xs">No tags</span>
            @endforelse
        </div>

        <!-- Back Button -->
        <a href="{{ route('jobs.index') }}" class="text-blue-500 hover:underline">← Back to Job Listings</a>
    </div>
</x-layout>
