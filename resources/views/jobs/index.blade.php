<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <div class="grid gap-4">
        @foreach($jobs as $job)
            <div class="bg-white p-4 rounded shadow">
                <h2 class="text-xl font-semibold">{{ $job->title }}</h2>
                <p class="text-sm text-gray-500">{{ $job->company }} • {{ $job->location }}</p>
                <p class="mt-2 text-gray-700">{{ \Illuminate\Support\Str::limit($job->description, 120) }}</p>
                <a href="{{ url('/jobs/'.$job->id) }}" class="mt-3 inline-block text-indigo-600 hover:underline">View Job</a>
            </div>
        @endforeach
    </div>
</x-layout>
