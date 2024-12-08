<x-frontPage.layout>
    <x-slot:title>Community Leadership</x-slot:title>

    <section class="py-12">
        <div class="max-w-screen-xl px-6 mx-auto text-center">
            <!-- Title -->
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8">Community Members</h1>
            
            <!-- Search Bar -->
            <div class="mb-8">
                <input 
                    type="text" 
                    placeholder="Search community members..." 
                    class="w-full max-w-md px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500"
                />
            </div>
            
            <!-- Member List -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12 mb-12">
                <!-- Member Item -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <img 
                            src="{{ asset('img/Ahmad.jpeg') }}" 
                            alt="Leslie Alexander"
                            class="w-24 h-24 rounded-full border shadow-md"
                        />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Leslie Alexander</h3>
                    <p class="text-sm text-gray-500">Co-Founder / CEO</p>
                </div>

                <!-- Member Item -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <img 
                            src="{{ asset('img/Ahmad.jpeg') }}" 
                            alt="Dries Vincent"
                            class="w-24 h-24 rounded-full border shadow-md"
                        />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Dries Vincent</h3>
                    <p class="text-sm text-gray-500">Business Relations</p>
                </div>

                <!-- Member Item -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <img 
                            src="{{ asset('img/Ahmad.jpeg') }}" 
                            alt="Michael Foster"
                            class="w-24 h-24 rounded-full border shadow-md"
                        />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Michael Foster</h3>
                    <p class="text-sm text-gray-500">Co-Founder / CTO</p>
                </div>

                <!-- Member Item -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <img 
                            src="{{ asset('img/Ahmad.jpeg') }}" 
                            alt="Lindsay Walton"
                            class="w-24 h-24 rounded-full border shadow-md"
                        />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Lindsay Walton</h3>
                    <p class="text-sm text-gray-500">Front-end Developer</p>
                </div>

                <!-- Member Item -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <img 
                            src="{{ asset('img/Ahmad.jpeg') }}" 
                            alt="Courtney Henry"
                            class="w-24 h-24 rounded-full border shadow-md"
                        />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Courtney Henry</h3>
                    <p class="text-sm text-gray-500">Designer</p>
                </div>

                <!-- Member Item -->
                <div class="text-center">
                    <div class="flex justify-center mb-4">
                        <img 
                            src="{{ asset('img/Ahmad.jpeg') }}" 
                            alt="Tom Cook"
                            class="w-24 h-24 rounded-full border shadow-md"
                        />
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800">Tom Cook</h3>
                    <p class="text-sm text-gray-500">Director of Product</p>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center items-center space-x-2 mt-12">
                <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">&laquo;</button>
                <button class="px-4 py-2 bg-blue-500 text-white rounded-lg">1</button>
                <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">2</button>
                <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">3</button>
                <button class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">&raquo;</button>
            </div>
        </div>
    </section>
</x-frontPage.layout>
