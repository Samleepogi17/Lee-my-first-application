<x-layout>
    <x-slot:heading>Job Listings</x-slot:heading>

    {{-- Success message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- Top bar: Create + Search --}}
    <div class="flex flex-col md:flex-row md:justify-between items-start md:items-center mb-6 gap-4">
        <a href="{{ route('jobs.create') }}" class="bg-indigo-600 text-white px-5 py-2 rounded shadow hover:bg-indigo-500 transition">
            + Create Job
        </a>

        <form method="GET" action="{{ route('jobs.index') }}" class="flex gap-2 w-full md:w-auto">
            <input type="text" name="search" placeholder="Search jobs..." value="{{ $search ?? '' }}"
                   class="border rounded px-4 py-2 w-full md:w-64 focus:ring-2 focus:ring-indigo-500 focus:outline-none">
            <button type="submit" class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                Search
            </button>
        </form>
    </div>

    {{-- Job list --}}
    @if($jobs->isEmpty())
        <p class="text-center text-gray-500 mt-10">No jobs available.</p>
    @else
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($jobs as $job)
                <div class="bg-white border rounded-lg shadow p-6 flex flex-col justify-between hover:shadow-lg transition">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $job->title }}</h2>
                        <p class="text-gray-700 mt-1">Salary: <span class="font-semibold">{{ $job->salary }}</span></p>
                        <p class="text-gray-500 mt-1">Employer: {{ $job->employer->name ?? 'N/A' }}</p>
                        @if($job->tags->isNotEmpty())
                            <div class="mt-2 flex flex-wrap gap-2">
                                @foreach($job->tags as $tag)
                                    <span class="text-sm bg-indigo-100 text-indigo-700 px-2 py-1 rounded-full">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <div class="mt-4 flex gap-2">
                        <a href="{{ route('jobs.show', $job) }}" class="text-blue-600 hover:underline">View</a>
                        <a href="{{ route('jobs.edit', $job) }}" class="text-yellow-600 hover:underline">Edit</a>

                        <form action="{{ route('jobs.destroy', $job) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $jobs->links() }}
        </div>
    @endif
</x-layout>
