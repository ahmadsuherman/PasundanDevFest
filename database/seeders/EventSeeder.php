<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::create([
            'category_id'       => 1,
            'slug'              => 'tech-meetup:academic-&-industry-machine-learning',
            'title'             => 'Tech Meetup: Academic & Industry Machine Learning',
            'description'       => '<article class="prose-config whitespace-pre-wrap"><p>Halo para software developer di Bandung dan sekitarnya. PasundanDevFestakan mengadakan meetup spesial nih!</p><h1>PasundanDevFestTech Meetup: Academic &amp; Industry</h1><p>Talkshow ini menghadirkan para developer legendaris di sekitar Bandung dari dua sisi karir, akademis dan industri.</p><ul><li><p>Sandhika Galih (WPU)</p></li><li><p>Erico Darmawan Handoyo (Komunitas Flutter Indonesia)</p></li><li><p>Faqihza Mukhlish (Kelas Terbuka)</p></li><li><p>Eko Kurniawan Khannedy (<a target="_blank" rel="noopener noreferrer" class="prose-a-styles" href="">Blibli.com</a>&nbsp;&amp; Programmer Zaman Now)</p></li><li><p>Hendi Santika (JVM Indonesia)</p></li><li><p>Hendri Karisma (PT. Akar Inti Data)</p></li></ul><p>Kita akan ngobrol bareng terkait perbedaan dunia pengalaman kerja di akademis dan profesional industri di bidang software engineering dan app development. Juga hal-hal lain seperti komunitas teknologi, pengalaman, dan perjalanan karir di dunia teknologi.</p><h2>AGENDA</h2><h4>Opening</h4><ul><li><p>12:00 - 13:00 Open gate check-in</p></li><li><p><strong>13:00 - 13:01 Opening from PasundanDev</strong></p></li><li><p>13:01 - 13:06 Ad libs from BLOCK71 Bandung as venue</p></li><li><p>13:06 - 13:11 Ad libs from CodePolitan as sponsor: Kresna Galuh</p></li><li><p>13:11 - 13:16 Lezz Low Code official launch from DumbWays: Ega Radiegtya</p></li><li><p>13:16 - 13:20 Keynote from BandungDev: M Haidar Hanif</p></li></ul><h4>Content</h4><ul><li><p><strong>13:20 - 13:50 Session 1: Sandhika, Erico, Puqis</strong></p></li><li><p>13:50 - 14:00 Session 1: QA with Audience</p></li><li><p>14:00 - 14:05 Quick Break</p></li><li><p><strong>14:05 - 14:35 Session 2: Eko, Hendi, Hendri</strong></p></li><li><p>14:35 - 14:45 Session 2: QA with audience</p></li><li><p>14:45 - 14:50 Quick Break</p></li><li><p><strong>14:50 - 15:10 Session 3: Sandhika, Erico, Puqis, Eko, Hendi, Hendri</strong></p></li><li><p>15:10 - 15:20 Session 3: QA with audience</p></li></ul><h4>Closing</h4><ul><li><p><strong>15:30 - 15:35 Closing remarks</strong></p></li><li><p>15:35 - 15:40 Photo session</p></li><li><p>15:40 - 16:00 Networking session</p></li></ul><h2>BENEFIT</h2><ul><li><p>Pengetahuan praktikal</p></li><li><p>Networking dengan ahli akademisi dan praktisi</p></li><li><p>E-certificate (digital)</p></li><li><p>Swag/merchandise (stiker, dsb)</p></li><li><p>Kesempatan bertanya kepada ahli</p></li><li><p>Kesempatan doorprize kaos BandungDev</p></li></ul><h2>DETAIL ACARA</h2><ul><li><p>Kuota: 150 orang</p></li><li><p>Lokasi: BLOCK71 Bandung</p></li><li><p>Hari/Tanggal: Minggu, 18 Februari 2024</p></li><li><p>Waktu: 13:00 - 16:00 WIB, harap datang lebih awal agar lebih santai</p></li><li><p>Tiket: <strong>TIKET TELAH HABIS ðŸ™ Tunggu info lebih lanjut di grup Telegram BandungDev</strong></p></li></ul><p>Acara ini bekerja sama dengan BLOCK71 Bandung. Disponsori oleh CodePolitan dan DumbWays Coding Bootcamp.</p><p>Serta berbagai komunitas lainnya: WPU, Programmer Zaman Now (PZN), Komunitas Flutter Indonesia, JVM Indonesia, Kelas Terbuka, Indonesia Belajar, GDG Bandung (Google Developer Group), BandungPy, Android Developer Bandung (ADB), Binary Nusantara, Bearmentor, Catamyst, dan lain-lain.</p><p>Sampai ketemu di sana!<br>Tim BandungDev</p></article>',
            'images'            => 'event-1.jpg',
            'start_date'        => Carbon::now(),
            'end_date'          => Carbon::now(),
            'location'          => 'BLOCK71 Bandung, Innovation Factory, Jl. Ir. H. Juanda No.108, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132',
            'status'            => true,
            'is_paid'           => false,
            'price'             => null
        ]);
    }
}
