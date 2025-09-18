<x-layout>
    <x-slot:heading>
        IT Jobs
    </x-slot:heading>

    <ul class="list-disc pl-5">
        @foreach ($jobs as $job)
            <li class="mb-2">
                <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                    <strong>{{ $job['title'] }}:</strong> Pays {{ $job['salary'] }} per year
                </a>
            </li>
        @endforeach
    </ul>
</x-layout>
