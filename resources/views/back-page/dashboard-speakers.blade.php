<x-backPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <h1>Hi, {{ Auth()->user()->fullname ?? 'User' }}</h1>

    <div class="container mx-auto bg-gray-100 min-h-screen mt-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 shadow-xl rounded-lg p-6 flex flex-col space-y-6 text-white">
        <div class="flex items-center space-x-4">
            <div class="p-4 bg-white bg-opacity-20 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
            </svg>
            </div>
            <div>
            <h2 class="text-xl font-semibold">Total Events</h2>
            <p class="text-lg">{{ $eventCount}}</p>
            </div>
        </div>
        <div>
            <a 
            class="bg-white bg-opacity-20 hover:bg-opacity-30 transition text-white text-sm font-semibold h-10 rounded-md px-5 flex items-center justify-center"
            href="{{ url('events') }}"
            >
            View All Events
            </a>
        </div>
        </div>

        <div class="bg-gradient-to-r from-yellow-500 to-yellow-700 shadow-xl rounded-lg p-6 flex flex-col space-y-6 text-white">
        <div class="flex items-center space-x-4">
            <div class="p-4 bg-white bg-opacity-20 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
            </svg>
            </div>
            <div>
            <h2 class="text-xl font-semibold">Total Events yang Dibawakan</h2>
            <p class="text-lg">{{ $eventHostedCount }}</p>
            </div>
        </div>
        <div>
            <a 
            class="bg-white bg-opacity-20 hover:bg-opacity-30 transition text-white text-sm font-semibold h-10 rounded-md px-5 flex items-center justify-center"
            href="{{ url('events') }}"
            >
            View All Events
            </a>
        </div>
        </div>
    </div>
    </div>
</x-backPage.layout>