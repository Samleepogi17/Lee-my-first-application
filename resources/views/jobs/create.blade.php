<x-layout>
    <x-slot:heading>Create Job</x-slot:heading>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('jobs.store') }}" class="space-y-6">
        @csrf

        <div>
            <label for="title" class="block font-semibold">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" class="border px-3 py-2 rounded w-full" required>
            @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="salary" class="block font-semibold">Salary</label>
            <input type="text" name="salary" id="salary" value="{{ old('salary') }}" class="border px-3 py-2 rounded w-full" required>
            @error('salary')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-end gap-2">
            <a href="{{ route('jobs.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Cancel</a>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">Save Job</button>
        </div>
    </form>
</x-layout>
