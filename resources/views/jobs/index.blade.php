<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <!-- Optional: Search Bar -->
    <form method="GET" action="{{ route('jobs.index') }}" class="mb-6 flex">
        <input
            type="text"
            name="search"
            value="{{ request('search') }}"
            placeholder="Search jobs..."
            class="border rounded-l px-3 py-2 flex-grow"
        >
        <button type="submit" class="bg-blue-500 text-white px-4 rounded-r hover:bg-blue-600">
            Search
        </button>
    </form>

    @if($jobs->isEmpty())
        <p class="text-center text-gray-500 mt-10">No jobs available at the moment.</p>
    @else
        <ul class="space-y-4">
            @foreach ($jobs as $job)
                <li class="bg-white rounded-lg shadow hover:shadow-lg transition">
                    <!-- Job Info -->
                    <a href="{{ route('jobs.show', $job->id) }}" class="block px-4 py-6 border-b border-gray-200">
                        <div class="font-bold text-blue-500 text-sm">
                            {{ $job->employer->name ?? 'No Employer' }}
                        </div>
                        <div>
                            <strong class="text-lg">{{ $job->title }}</strong>
                            <span class="text-gray-600">- ${{ number_format($job->salary) }} per year</span>
                        </div>
                    </a>

                    <!-- Tags -->
                    <div class="px-4 py-4">
                        @forelse($job->tags as $tag)
                            <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                                {{ $tag->name }}
                            </span>
                        @empty
                            <span class="text-gray-400 text-xs">No tags</span>
                        @endforelse
                    </div>
                </li>
            @endforeach
        </ul>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center">
            {{ $jobs->links() }}
        </div>
    @endif
</x-layout>
