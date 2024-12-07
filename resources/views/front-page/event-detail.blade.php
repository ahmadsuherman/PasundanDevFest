<x-frontPage.layout>
    <x-slot:title>Event Detail - PasundanDev</x-slot:title>

    <!-- Hero Section -->
    <section class="py-16 bg-gray-100">
        <div class="max-w-screen-lg px-6 mx-auto text-center">
            <h1 class="text-4xl font-extrabold text-gray-900 md:text-5xl">Event Details</h1>
        </div>
    </section>

    <!-- Event Detail Section -->
    <section class="py-12">
        <div class="max-w-screen-lg px-6 mx-auto">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <!-- Event Image -->
                <div>
                    <img src="path-to-event-image.jpg" alt="Event Image" class="w-full rounded-lg shadow-lg">
                </div>

                <!-- Event Information -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Tech Meetup: AI & ML Drama</h2>
                    <p class="text-lg text-gray-700 mb-6">
                        Join us in discussing the latest trends and challenges in Artificial Intelligence (AI) 
                        and Machine Learning (ML). Learn from industry experts and network with fellow tech enthusiasts.
                    </p>

                    <div class="text-gray-700 space-y-4">
                        <p><strong>Date:</strong> October 12, 2024</p>
                        <p><strong>Time:</strong> 17:00 - 18:00 WIB</p>
                        <p><strong>Location:</strong> BLOCK71 Bandung</p>
                        <p><strong>Event Type:</strong> Free Entry</p>
                    </div>

                    <!-- Registration Button -->
                    <button class="mt-6 px-6 py-3 bg-blue-600 text-white text-lg font-semibold rounded shadow hover:bg-blue-700">
                        Register Now
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Info Section -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-screen-lg px-6 mx-auto">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Why You Should Join?</h3>
            <p class="text-lg text-gray-700">
                This event offers a unique opportunity to deepen your understanding of AI and ML, 
                connect with like-minded professionals, and explore practical solutions to modern challenges 
                in technology. Don't miss this chance to learn, share, and grow.
            </p>
        </div>
    </section>
</x-frontPage.layout>
