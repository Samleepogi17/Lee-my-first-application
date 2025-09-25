<x-layout>
    <x-slot:heading>
        Job Listings
    </x-slot:heading>

    <ul class="space-y-4">
        @forelse ($jobs as $job)
            <li class="bg-white rounded-lg shadow hover:shadow-lg transition">
                <!-- Job Info -->
                <a href="{{ route('jobs.show', $job->id) }}" class="block px-4 py-6 border-b border-gray-200">
                    <div class="font-bold text-blue-500 text-sm">
                        {{ $job->employer->name ?? 'No Employer' }}
                    </div>
                    <div>
                        <strong class="text-lg">{{ $job->title }}</strong>
                        <span class="text-gray-600"> - ${{ number_format($job->salary) }} per year</span>
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
        @empty
            <li class="text-center text-gray-500 py-6">No jobs available at the moment.</li>
        @endforelse
    </ul>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $jobs->links() }}
    </div>
</x-layout>
