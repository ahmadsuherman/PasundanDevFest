<x-frontPage.layout>
    <x-slot:title>Events</x-slot:title>

    <section class="py-12">
        <div class="max-w-screen-lg px-6 mx-auto">

            <div class="text-center mb-12">
                <h1 class="text-3xl font-extrabold text-gray-900 md:text-4xl">All Events</h1>
                <p class="mt-4 text-lg text-gray-600">Upcoming events and completed events</p>
            </div>


            <div class="space-y-8">

            <div class="mt-12">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Upcoming Events</h3>
                <div class="space-y-8">
                
                    <div class="flex items-center gap-6 p-4 border rounded-lg shadow-lg bg-white">
                        <img src="{{ asset('img/Event.png') }}" alt="Upcoming Event 1" class="w-64 h-40 object-cover rounded-lg">
                        <div>
                            <h4 class="text-xl font-bold text-gray-800">Tech Summit 2025</h4>
                            <p class="text-gray-600 mt-2">Exploring the future of tech and innovation.</p>
                            <p class="text-sm text-gray-500 mt-2">
                                <strong>Date:</strong> January 15, 2025 <br>
                                <strong>Location:</strong> Bandung Convention Center
                            </p>
                            <button class="mt-4 px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Register Now</button>
                        </div>
                    </div>
                </div>
            </div>
             
            <h3 class="text-2xl font-bold text-gray-800 mb-4">Past Events</h3>
                <div class="space-y-8">
             
                <div class="flex items-center gap-6 p-4 border rounded-lg shadow-lg">
                    <img src="{{ asset('img/Event.png') }}" alt="Event 1" class="w-64 h-40 object-cover rounded-lg">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-800">Tech Meetup: Infra, DevOps</h3>
                        <p class="text-gray-600 mt-2">Web infrastructure, DevOps, and Cloud Drama.</p>
                        <p class="text-sm text-gray-500 mt-2 mb-4">
                            <strong>Date:</strong> November 23, 2024 <br>
                            <strong>Location:</strong> Auditorium WJI-Hub
                        </p>
                        <a href="/events/ifra-devops" class="mt-4 px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">View Event</a>
                    </div>
                </div>

             
                <div class="space-y-8">
             
             <div class="flex items-center gap-6 p-4 border rounded-lg shadow-lg">
                 <img src="{{ asset('img/Event.png') }}" alt="Event 1" class="w-64 h-40 object-cover rounded-lg">
                 <div>
                     <h3 class="text-2xl font-bold text-gray-800">Tech Meetup: Infra, DevOps</h3>
                     <p class="text-gray-600 mt-2">Web infrastructure, DevOps, and Cloud Drama.</p>
                     <p class="text-sm text-gray-500 mt-2 mb-4">
                         <strong>Date:</strong> November 23, 2024 <br>
                         <strong>Location:</strong> Auditorium WJI-Hub
                     </p>
                     <a href="/events/ifra-devops" class="mt-4 px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">View Event</a>
                 </div>
             </div>

            
             <div class="space-y-8">
             
             <div class="flex items-center gap-6 p-4 border rounded-lg shadow-lg">
                 <img src="{{ asset('img/Event.png') }}" alt="Event 1" class="w-64 h-40 object-cover rounded-lg">
                 <div>
                     <h3 class="text-2xl font-bold text-gray-800">Tech Meetup: Infra, DevOps</h3>
                     <p class="text-gray-600 mt-2">Web infrastructure, DevOps, and Cloud Drama.</p>
                     <p class="text-sm text-gray-500 mt-2 mb-4">
                         <strong>Date:</strong> November 23, 2024 <br>
                         <strong>Location:</strong> Auditorium WJI-Hub
                     </p>
                     <a href="/events/ifra-devops" class="mt-4 px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">View Event</a>
                 </div>
             </div>

             
             <div class="space-y-8">
             
             <div class="flex items-center gap-6 p-4 border rounded-lg shadow-lg">
                 <img src="{{ asset('img/Event.png') }}" alt="Event 1" class="w-64 h-40 object-cover rounded-lg">
                 <div>
                     <h3 class="text-2xl font-bold text-gray-800">Tech Meetup: Infra, DevOps</h3>
                     <p class="text-gray-600 mt-2">Web infrastructure, DevOps, and Cloud Drama.</p>
                     <p class="text-sm text-gray-500 mt-2 mb-4">
                         <strong>Date:</strong> November 23, 2024 <br>
                         <strong>Location:</strong> Auditorium WJI-Hub
                     </p>
                     <a href="/events/ifra-devops" class="mt-4 px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">View Event</a>
                 </div>
             </div>
            </div>
        </div>
    </section>
</x-frontPage.layout>
