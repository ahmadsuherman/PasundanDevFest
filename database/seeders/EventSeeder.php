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
            'slug'              => 'tech-meetup-academic-and-industry-machine-learning',
            'title'             => 'Tech Meetup: Academic & Industry Machine Learning',
            'description'       => 'Talkshow spesial dengan para developer legendaris di Bandung dari dua sisi karir',
            'images'            => '/storage/events/default-event.png',
            'start_date'        => Carbon::now()->addWeekdays(4),
            'end_date'          => Carbon::now()->addWeekdays(4),
            'location'          => 'BLOCK71 Bandung, Innovation Factory, Jl. Ir. H. Juanda No.108, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132',
            'status'            => true,
            'is_paid'           => true,
            'price'             => 100000
        ]);

        Event::create([
            'category_id'       => 2,
            'slug'              => 'tech-meetup-ai-and-ml-drama',
            'title'             => 'Tech Meetup: AI & ML Drama',
            'description'       => 'Membahas Artificial Intelligence (AI) & Machine Learning (ML)',
            'images'            => '/storage/events/default-event.png',
            'start_date'        => Carbon::now()->addWeekdays(4),
            'end_date'          => Carbon::now()->addWeekdays(4),
            'location'          => 'BLOCK71 Bandung, Innovation Factory, Jl. Ir. H. Juanda No.108, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132',
            'status'            => true,
            'is_paid'           => false,
            'price'             => null
        ]);

        Event::create([
            'category_id'       => 3,
            'slug'              => 'tech-meetup-backend-drama',
            'title'             => 'Tech Meetup: Backend Drama',
            'description'       => 'Membahas situasi backend terkini, spesifik bahasa pemrograman (JS/TS, Java, PHP, dsb), library/framework (Node.js, Spring, Laravel, dsb), arsitektur, komunitas, dsb',
            'images'            => '/storage/events/default-event.png',
            'start_date'        => Carbon::now(),
            'end_date'          => Carbon::now(),
            'location'          => 'Jabar Digital Service (JDS) Ruang Selatan (Jabar Command Center) samping Masjid Al-Muttaqin, Gedung Sate, Bandung',
            'status'            => true,
            'is_paid'           => false,
            'price'             => null
        ]);

        Event::create([
            'category_id'       => 4,
            'slug'              => 'tech-meetup-product-engineering',
            'title'             => 'Tech Meetup: Product Engineering++',
            'description'       => 'Meetup santai membahas Product Engineering, MVP (Minimum Viable Product), Team Scaling, Startup, ++',
            'images'            => '/storage/events/default-event.png',
            'start_date'        => Carbon::now(),
            'end_date'          => Carbon::now(),
            'location'          => 'Evermos HQ',
            'status'            => true,
            'is_paid'           => true,
            'price'             => 100000
        ]);

        Event::create([
            'category_id'       => 5,
            'slug'              => 'tech-meetup-frontend-drama',
            'title'             => 'Tech Meetup: Frontend Drama',
            'description'       => 'Membahas situasi frontend, spesifik library/framework (React, Vue, Angular, dsb), arsitektur, komunitas, dsb',
            'images'            => '/storage/events/default-event.png',
            'start_date'        => Carbon::now(),
            'end_date'          => Carbon::now(),
            'location'          => 'BLOCK71 Bandung, Innovation Factory, Jl. Ir. H. Juanda No.108, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132',
            'status'            => true,
            'is_paid'           => false,
            'price'             => null
        ]);

    }
}
