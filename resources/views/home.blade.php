<x-layout>
    <x-slot:heading>
        Welcome to JobSeeker
    </x-slot:heading>

    <!-- Hero Section -->
    <section class="bg-blue-600 text-white py-16 rounded-xl shadow mb-10">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Find Your Dream IT Job</h1>
            <p class="text-lg mb-6">
                Explore top opportunities for developers, analysts, and IT professionals.
            </p>

            <!-- Search Bar -->
            <form action="/jobs" method="GET" class="flex bg-white rounded-lg overflow-hidden shadow max-w-xl mx-auto">
                <input type="text" name="search" placeholder="Search jobs..." 
                       class="w-full px-4 py-2 text-gray-700 focus:outline-none">
                <button type="submit" class="bg-blue-700 px-6 text-white font-semibold hover:bg-blue-800 transition">
                    Search
                </button>
            </form>
        </div>
    </section>

    <!-- Quick Tool -->
    <section class="max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h3 class="text-xl font-bold text-gray-900 mb-2">💼 Browse Jobs</h3>
            <p class="text-gray-600 mb-4">
                Explore available IT job listings and find the right match.
            </p>
            <a href="/jobs" class="text-blue-600 font-semibold hover:underline">View Jobs →</a>
        </div>
    </section>
</x-layout>
