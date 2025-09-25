<x-layout>
    <x-slot:heading>{{ $job->exists ? 'Edit Job' : 'Create Job' }}</x-slot:heading>

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-lg shadow">
        <form method="POST" 
              action="{{ $job->exists ? route('jobs.update', $job) : route('jobs.store') }}" 
              class="space-y-6">
            
            @csrf
            @if($job->exists)
                @method('PATCH')
            @endif

            {{-- Job Title --}}
            <div>
                <label for="title" class="block text-gray-700 font-semibold mb-2">Job Title</label>
                <input type="text" name="title" id="title"
                       value="{{ old('title', $job->title ?? '') }}"
                       class="border rounded px-4 py-2 w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                       placeholder="Enter job title" required>
                @error('title')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Salary --}}
            <div>
                <label for="salary" class="block text-gray-700 font-semibold mb-2">Salary</label>
                <input type="text" name="salary" id="salary"
                       value="{{ old('salary', $job->salary ?? '') }}"
                       class="border rounded px-4 py-2 w-full focus:ring-2 focus:ring-indigo-500 focus:outline-none"
                       placeholder="Enter salary" required>
                @error('salary')<p class="text-red-500 text-sm mt-1">{{ $message }}</p>@enderror
            </div>

            {{-- Form buttons --}}
            <div class="flex justify-end gap-3">
                <a href="{{ route('jobs.index') }}" class="px-5 py-2 border rounded hover:bg-gray-100 transition">Cancel</a>
                <button type="submit" class="bg-indigo-600 text-white px-5 py-2 rounded hover:bg-indigo-500 transition">
                    {{ $job->exists ? 'Update Job' : 'Save Job' }}
                </button>
            </div>
        </form>
    </div>
</x-layout>
