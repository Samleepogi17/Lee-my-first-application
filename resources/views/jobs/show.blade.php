<x-layout>
    <x-slot:heading>Job Details</x-slot:heading>

    <div class="border p-6 rounded bg-white shadow space-y-4">
        <h2 class="text-2xl font-bold">{{ $job->title }}</h2>
        <p class="text-gray-700">Salary: {{ $job->salary }}</p>
        <p class="text-gray-500">Employer: {{ $job->employer->name ?? 'N/A' }}</p>

        @if($job->tags->isNotEmpty())
            <div>
                <h3 class="font-semibold">Tags:</h3>
                <div class="flex flex-wrap gap-2 mt-1">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-200 px-2 py-1 rounded text-sm">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="flex gap-2 mt-4">
            <a href="{{ route('jobs.edit', $job) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-400">Edit Job</a>
            <a href="{{ route('jobs.index') }}" class="bg-gray-300 px-4 py-2 rounded hover:bg-gray-200">Back to List</a>
        </div>
    </div>
</x-layout>
