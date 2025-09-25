<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Site</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                <!-- Logo -->
                <div class="flex flex-shrink-0 items-center font-bold">
                    <a href="/" class="text-white hover:text-gray-300">My Site</a>
                </div>

                <!-- Desktop menu -->
                <div class="hidden md:flex items-center space-x-4">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/jobs" :active="request()->is('jobs*')">Jobs</x-nav-link>
                    </div>

                    <!-- Create Job Button -->
                    <a href="{{ route('jobs.create') }}" 
                       class="ml-4 bg-indigo-600 text-white px-3 py-2 rounded hover:bg-indigo-500">
                        Create Job
                    </a>
                </div>

            </div>
        </div>

        <!-- Mobile menu -->
        <div class="md:hidden" id="mobile-menu">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                <x-nav-link href="/jobs" :active="request()->is('jobs*')">Jobs</x-nav-link>
                <!-- Mobile Create Job Button -->
                <a href="{{ route('jobs.create') }}" 
                   class="block bg-indigo-600 text-white px-3 py-2 rounded hover:bg-indigo-500">
                    Create Job
                </a>
            </div>
        </div>
    </nav>

    <!-- Page heading -->
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $heading ?? '' }}</h1>
        </div>
    </header>

    <!-- Main content -->
    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

            <!-- Flash Messages -->
            @if(session('success'))
                <div class="mb-4 rounded bg-green-100 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot }}
        </div>
    </main>

</body>
</html>
