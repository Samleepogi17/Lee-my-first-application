<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div class="max-w-lg mx-auto bg-white rounded-xl shadow-md p-6 border border-gray-200">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">
            {{ $job->title }}
        </h2>

        <p class="text-gray-600 mb-2">
            💰 Salary: <span class="font-medium text-green-600">{{ $job->salary }}</span>
        </p>

        <p class="text-gray-500 mb-4">
            🏢 Employer: <span class="font-medium">{{ $job->employer->name }}</span>
        </p>

        <p class="text-gray-700 mb-6 leading-relaxed">
            📌 {{ $job->description ?? 'No description provided.' }}
        </p>

        <a href="/jobs" 
           class="inline-block bg-gray-700 text-white text-sm font-medium px-4 py-2 rounded-lg hover:bg-gray-800 transition">
            ← Back to Jobs
        </a>
    </div>
</x-layout>
