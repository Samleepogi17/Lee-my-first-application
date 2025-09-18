<x-layout>
    <x-slot:heading>
        {{ $job->title }}
    </x-slot:heading>

    <div class="bg-white p-6 rounded shadow">
        <p class="text-sm text-gray-500">{{ $job->company }} • {{ $job->location }} • {{ $job->salary }}</p>
        <div class="mt-4 text-gray-700 leading-relaxed">
            {{ $job->description }}
        </div>

        <a href="{{ url('/jobs') }}" class="mt-4 inline-block text-indigo-600 hover:underline">← Back to listings</a>
    </div>
</x-layout>
