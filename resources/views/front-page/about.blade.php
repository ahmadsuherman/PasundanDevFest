<x-frontPage.layout>
    <x-slot:title>About PasundanDev</x-slot:title>

    <section class="py-12">
        <div class="max-w-screen-lg px-6 mx-auto text-center">
            <h1 class="text-3xl font-extrabold text-gray-900 md:text-4xl mb-4">About PasundanDev</h1>
            <p class="mt-4 text-lg text-gray-700">
               PasundanDev adalah komunitas teknologi yang berfokus pada pengembangan ekosistem bagi para pengembang perangkat lunak, programmer, engineer, dan individu lain
               yang memiliki passion di bidang teknologi. Kami hadir untuk menyediakan ruang bagi para profesional maupun pemula untuk berbagi pengetahuan, berdiskusi,
             dan berkolaborasi dalam menciptakan solusi teknologi yang inovatif.
            </p>
            <p class="mt-4 text-lg text-gray-700">
               Kami percaya bahwa teknologi adalah fondasi masa depan, dan kolaborasi adalah kunci untuk mencapainya. 
               Melalui berbagai kegiatan seperti workshop, seminar, hackathon, hingga diskusi daring, PasundanDev berkomitmen untuk 
               menjadi platform yang mempertemukan talenta-talenta terbaik dari berbagai latar belakang dan keahlian. 
               Tujuan kami adalah membantu para anggota untuk tumbuh, belajar, dan memberikan kontribusi nyata bagi komunitas teknologi lokal maupun global.
            </p>
            <p class="mt-4 text-lg text-gray-700">
                Sebagai bagian dari misi kami, PasundanDev juga berperan aktif dalam mendorong perkembangan teknologi di Jawa Barat, 
                khususnya dalam menciptakan peluang dan inovasi berbasis teknologi yang bermanfaat bagi masyarakat luas. Bersama PasundanDev, 
                mari berkontribusi membangun komunitas teknologi yang inklusif, kolaboratif, dan siap menghadapi tantangan masa depan.
            </p>
        </div>
    </section>

    <section class="py-12">
        <div class="max-w-screen-lg px-6 mx-auto">

            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-900 md:text-4xl">Our Team</h2>
                <p class="mt-4 text-lg text-gray-600">
                    Meet the dedicated team members who bring our vision to life.
                </p>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
 
                <div class="p-6 border rounded-lg shadow">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('img/Ahmad.jpeg') }}" alt="Ahmad Suherman" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800">Ahmad Suherman</h3>
                    <p class="text-center text-gray-600">223040066</p>
                    <p class="mt-4 text-sm text-gray-700 text-center">
                    Ahmad Suherman adalah seorang Web Developer berpengalaman yang sangat tertarik dalam menciptakan aplikasi web 
                    yang efisien, fungsional, dan menarik. Ia mengutamakan pengalaman pengguna dan selalu berusaha memberikan solusi teknologi yang inovatif.
                    </p>
                </div>

                <div class="p-6 border rounded-lg shadow">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('img/Melinda.jpeg') }}" alt="Melinda Sulaiman" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800">Melinda Sulaiman</h3>
                    <p class="text-center text-gray-600">223040091</p>
                    <p class="mt-4 text-sm text-gray-700 text-center">
                       Melinda Sulaiman adalah seorang UI/UX Designer yang berorientasi pada proses. Mulai dari riset pengguna, pembuatan wireframe, hingga prototipe interaktif,
                       Melinda mengikuti pendekatan yang terstruktur untuk memastikan setiap desain memenuhi kebutuhan pengguna dan tujuan bisnis.
                    </p>
                </div>

                <div class="p-6 border rounded-lg shadow">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('img/Naufal.jpg') }}" alt="Naufal Zul Faza" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800">Naufal Zul Faza</h3>
                    <p class="text-center text-gray-600">223040131</p>
                    <p class="mt-4 text-sm text-gray-700 text-center">
                       Naufal Zul Faza adalah seorang Data Analyst dengan minat mendalam dalam menggali data untuk menemukan insight yang berharga. Dengan keahlian dalam Python, SQL, R, Tableau dan Power BI 
                       Naufal membantu bisnis membuat keputusan yang lebih baik berdasarkan data.
                    </p>
                </div>

                <div class="p-6 border rounded-lg shadow">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('img/Febi.jpeg') }}" alt="Febi Alia Rahman" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800">Febi Alia Rahman</h3>
                    <p class="text-center text-gray-600">223040059</p>
                    <p class="mt-4 text-sm text-gray-700 text-center">
                       Febi Alia Rahman adalah seorang pengembang perangkat lunak yang bersemangat dengan tantangan teknis.
                       Febi menikmati proses membangun solusi yang inovatif dan efisien. Dengan keahlian dalam back-end development, Febi berkontribusi dalam menciptakan produk digital yang berkualitas tinggi.
                    </p>
                </div>

                <div class="p-6 border rounded-lg shadow">
                    <div class="flex justify-center mb-4">
                        <img src="{{ asset('img/Kholish.jpeg') }}" alt="Muhammad Kholish Kamil" class="w-24 h-24 rounded-full object-cover">
                    </div>
                    <h3 class="text-xl font-bold text-center text-gray-800">Muhammad Kholish Kamil</h3>
                    <p class="text-center text-gray-600">223040141</p>
                    <p class="mt-4 text-sm text-gray-700 text-center">
                        Muhammad Kholish Kamil adalah seorang Front-End Developer yang berdedikasi untuk menciptakan antarmuka pengguna yang menarik dan intuitif. Dengan keahlian dalam HTML, CSS, JavaScript, 
                        Kholish berfokus pada pengembangan front-end yang responsif dan user-friendly.
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-frontPage.layout>
