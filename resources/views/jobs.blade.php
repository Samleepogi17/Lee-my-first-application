<x-layout>
    <x-slot:heading>
        IT Jobs
    </x-slot:heading>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($jobs as $job)
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition duration-300 border border-gray-200">
                <h3 class="text-xl font-bold text-gray-900 mb-2">
                    <a href="/jobs/{{ $job['id'] }}" class="text-blue-600 hover:underline">
                        {{ $job['title'] }}
                    </a>
                </h3>
                <p class="text-gray-700 mb-4">
                    💼 <span class="font-medium">Salary:</span> {{ $job['salary'] }} per year
                </p>
                <a href="/jobs/{{ $job['id'] }}" 
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    View Details
                </a>
            </div>
        @endforeach
    </div>
</x-layout>
