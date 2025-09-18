<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <h2 class="font-bold text-lg">{{ $job['title'] }}</h2>
    <p>This job pays {{ $job['salary'] }} per year.</p>
    <a href="/jobs" class="text-blue-600 hover:underline">Back to all jobs</a>
</x-layout>
