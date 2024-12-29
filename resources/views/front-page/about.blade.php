<x-frontPage.layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <section class="members">
      <div class="w-full-md">
        <h2 class="text-3xl font-bold mb-2 text-center">{{ $title }}</h2>

        <div class="max-w-screen-lg m-auto text-center">
            <p class="text-lg text-gray-700 text-justify">
               PasundanDev adalah komunitas teknologi yang berfokus pada pengembangan ekosistem bagi para pengembang perangkat lunak, programmer, engineer, dan individu lain
               yang memiliki passion di bidang teknologi. Kami hadir untuk menyediakan ruang bagi para profesional maupun pemula untuk berbagi pengetahuan, berdiskusi,
             dan berkolaborasi dalam menciptakan solusi teknologi yang inovatif.
            </p>
            <p class="mt-4 text-lg text-gray-700 text-justify">
               Kami percaya bahwa teknologi adalah fondasi masa depan, dan kolaborasi adalah kunci untuk mencapainya. 
               Melalui berbagai kegiatan seperti workshop, seminar, hackathon, hingga diskusi daring, PasundanDev berkomitmen untuk 
               menjadi platform yang mempertemukan talenta-talenta terbaik dari berbagai latar belakang dan keahlian. 
               Tujuan kami adalah membantu para anggota untuk tumbuh, belajar, dan memberikan kontribusi nyata bagi komunitas teknologi lokal maupun global.
            </p>
            <p class="mt-4 text-lg text-gray-700 text-justify">
                Sebagai bagian dari misi kami, PasundanDev juga berperan aktif dalam mendorong perkembangan teknologi di Jawa Barat, 
                khususnya dalam menciptakan peluang dan inovasi berbasis teknologi yang bermanfaat bagi masyarakat luas. Bersama PasundanDev, 
                mari berkontribusi membangun komunitas teknologi yang inklusif, kolaboratif, dan siap menghadapi tantangan masa depan.
            </p>
        </div>
        
      </div>
    </section>

    <section class="dark:bg-gray-900 py-4 px-4">
    <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
        <div class="mx-auto mb-8 max-w-screen-sm lg:mb-16">
        <h2 class="text-3xl font-bold mb-2 text-center">Our Team or Github Repository collabolators</h2>
            <p class="text-lg text-gray-700 sm:text-xl dark:text-gray-400">Meet the dedicated team members who bring our vision to life.</p>
        </div> 
        <div class="grid gap-8 lg:gap-16 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
        @switch($collaborators['status'])
            @case('success')
            @foreach($collaborators['data'] as $collabolator)
            <div class="text-center text-gray-500 dark:text-gray-400">
                <img class="mx-auto mb-4 w-36 h-36 rounded-full" src="{{ $collabolator['avatar_url'] }}" alt="{{ $collabolator['login'] }}">
                <h3 class="mb-1 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    {{ $collabolator['login'] }}
                </h3>
                <p>{{ $collabolator['role_name'] }}</p>
                <ul class="flex justify-center mt-4 space-x-4">
                    <li>
                        <a target="_blank" href="{{ $collabolator['html_url'] }}" class="text-gray-900 hover:text-gray-900 dark:hover:text-white dark:text-gray-300">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" /></svg>
                        </a>
                    </li>
                </ul>
            </div>
            @endforeach
            @break

            @case('error')
            <div class="col-span-3 text-center text-gray-500 dark:text-gray-400">{{ $collaborators['error'] }}</p>
            @break
        @endswitch
        </div>  
    </div>
    </section>
</x-frontPage.layout>
