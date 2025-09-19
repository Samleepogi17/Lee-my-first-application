<x-layout>
    <x-slot:heading>
        IT Jobs
    </x-slot:heading>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($jobs as $job)
            <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200 hover:shadow-xl hover:border-blue-400 transition duration-200">
                <h2 class="text-xl font-bold text-gray-800 mb-2">
                    {{ $job->title }}
                </h2>
                <p class="text-gray-600 mb-1">💼 Salary: {{ $job->salary }}</p>
                <p class="text-gray-500 text-sm mb-4">🏢 Employer: {{ $job->employer->name }}</p>
                <a href="/jobs/{{ $job->id }}" 
                   class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                    View Details
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
