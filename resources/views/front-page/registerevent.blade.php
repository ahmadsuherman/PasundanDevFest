<x-frontPage.layout>
    <x-slot:title>Event Detail - PasundanDev</x-slot:title>

    <!-- Hero Section -->
    <section class="py-16">
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
                    <img src="{{ asset('img/Event.png') }}" alt="Event Image" class="w-full rounded-lg shadow-lg">
                </div>

                <!-- Event Information -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">Tech Summit 2025: Empowering Innovation for the Future</h2>
                    <p class="text-lg text-gray-700 mb-6">
                    Selamat datang di *Tech Summit 2025*, sebuah konferensi teknologi tahunan yang mempertemukan para pemimpin, profesional, 
                    dan penggiat teknologi dari berbagai latar belakang. Acara ini berfokus pada eksplorasi tren terkini, pengembangan keterampilan, 
                    dan kolaborasi untuk membangun solusi inovatif di masa depan.
                    </p>

                    <div class="text-gray-700 space-y-4">
                        <p><strong>Date:</strong> October 12, 2024</p>
                        <p><strong>Time:</strong> 17:00 - 18:00 WIB</p>
                        <p><strong>Location:</strong> BLOCK71 Bandung</p>
                        <p><strong>Event Type:</strong> Free Entry</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Additional Info Section -->
    <section class="py-12">
        <div class="max-w-screen-lg px-6 mx-auto">
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Why You Should Join?</h3>
            
            <!-- Event Introduction -->
            <p class="text-lg text-gray-700 mb-6">
                <strong>Tech Summit 2025: Empowering Innovation for the Future</strong>  
                Selamat datang di *Tech Summit 2025*, sebuah konferensi teknologi tahunan yang mempertemukan para pemimpin, profesional, 
                dan penggiat teknologi dari berbagai latar belakang. Acara ini berfokus pada eksplorasi tren terkini, pengembangan keterampilan, 
                dan kolaborasi untuk membangun solusi inovatif di masa depan.
            </p>
            <p class="text-lg text-gray-700 mb-6">
                <strong>Tanggal:</strong> 15 Januari 2025<br>
                <strong>Lokasi:</strong> Hotel Astra, Kota Bandung
            </p>
            <p class="text-lg text-gray-700 mb-6">
                Acara ini menghadirkan pembicara ahli, diskusi panel, workshop praktis, dan sesi networking eksklusif. 
                Bergabunglah bersama kami untuk memperluas wawasan, menjalin koneksi, dan membangun masa depan teknologi yang lebih baik.
            </p>

            <!-- Agenda Section -->
            <h4 class="text-xl font-bold text-gray-900 mt-8 mb-4">Agenda Acara</h4>
            <ul class="list-disc list-inside text-lg text-gray-700 space-y-4">
                <li><strong>07.00 - 08.00:</strong> Registrasi dan Sarapan Pagi</li>
                <li><strong>08.00 - 09.30:</strong> Keynote Speech - "Revolutionizing the Future: AI, Blockchain, and Beyond"</li>
                <li><strong>09.30 - 10.30:</strong> Diskusi Panel - "Collaboration in the Tech Ecosystem: Startups & Corporations"</li>
                <li><strong>10.30 - 11.00:</strong> Coffee Break</li>
                <li><strong>11.00 - 12.30:</strong> Workshop 1 - "Hands-on Machine Learning: Building Your First AI Model"</li>
                <li><strong>12.30 - 14.00:</strong> Makan Siang dan Networking</li>
                <li><strong>14.00 - 15.30:</strong> Workshop 2 - "Design Thinking: Solving Problems Creatively in Tech Projects"</li>
                <li><strong>15.30 - 16.00:</strong> Coffee Break</li>
                <li><strong>16.00 - 17.30:</strong> Talk Show - "Empowering Women in Tech: Breaking Barriers and Leading Innovation"</li>
                <li><strong>17.30 - 18.00:</strong> Closing Speech</li>
                <li><strong>18.00 - 19.00:</strong> Networking Dinner</li>
            </ul>

            <!-- Benefits Section -->
            <h4 class="text-xl font-bold text-gray-900 mt-8 mb-4">Apa yang Akan Anda Dapatkan?</h4>
            <ul class="list-disc list-inside text-lg text-gray-700 space-y-4">
                <li><strong>Pengetahuan Baru:</strong> Wawasan mendalam tentang tren teknologi terkini seperti AI, Blockchain, dan desain kreatif.</li>
                <li><strong>Pengalaman Praktis:</strong> Kesempatan untuk mengikuti workshop yang langsung diaplikasikan dalam proyek teknologi nyata.</li>
                <li><strong>Jaringan Profesional:</strong> Kesempatan bertemu dengan para ahli, startup, dan profesional di bidang teknologi.</li>
                <li><strong>Inspirasi:</strong> Mendengar cerita inspiratif dari pembicara berpengalaman untuk memotivasi perjalanan karier Anda.</li>
            </ul>
        </div>
    </section>
</x-frontPage.layout>
