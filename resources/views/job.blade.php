<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-6 border border-gray-200">
        <!-- Employer Name -->
        <p class="text-sm text-gray-500">🏢 {{ $job->employer->name }}</p>

        <!-- Job Title -->
        <h2 class="font-bold text-lg">{{ $job->title }}</h2>

        <!-- Salary -->
        <p>💰 This job pays {{ $job->salary }} per year.</p>

        <!-- Tags (inserted here) -->
        <p class="text-sm text-gray-500 mt-2">
            Tags:
            @foreach ($job->tags as $tag)
                <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-xs font-semibold text-gray-700 mr-2">
                    {{ $tag->name }}
                </span>
            @endforeach
        </p>

        <!-- Optional Description -->
        <p class="text-gray-700 mb-6 leading-relaxed mt-4">
            {{ $job->description ?? 'No description provided.' }}
        </p>

        <!-- Back Link -->
        <a href="/jobs" 
           class="inline-block bg-gray-700 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-800 transition">
            ← Back to Jobs
        </a>
    </div>
</x-layout>
