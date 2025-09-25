<x-layout>
    <x-slot:heading>Edit Job</x-slot:heading>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('jobs.update', $job) }}" class="space-y-6">
        @csrf
        @method('PATCH')

        <div>
            <label for="title" class="block font-semibold">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $job->title) }}" class="border px-3 py-2 rounded w-full" required>
            @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="salary" class="block font-semibold">Salary</label>
            <input type="text" name="salary" id="salary" value="{{ old('salary', $job->salary) }}" class="border px-3 py-2 rounded w-full" required>
            @error('salary')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('jobs.index') }}" class="px-4 py-2 rounded border hover:bg-gray-100">Cancel</a>
            
            <div class="flex gap-2">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-500">Update Job</button>

                <form method="POST" action="{{ route('jobs.destroy', $job) }}" onsubmit="return confirm('Are you sure?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-500">Delete Job</button>
                </form>
            </div>
        </div>
    </form>
</x-layout>
