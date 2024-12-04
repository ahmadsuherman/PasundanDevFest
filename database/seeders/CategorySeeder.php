<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'          => 'Machine Learning',
            'slug'          => 'machine-learning',
        ]);

        Category::create([
            'name'          => 'Web Development',
            'slug'          => 'web-development',
        ]);

        Category::create([
            'name'          => 'Network and Cyber Security',
            'slug'          => 'network-and-cyber-security',
        ]);

        Category::create([
            'name'          => 'Mobile Development',
            'slug'          => 'mobile-development',
        ]);

        Category::create([
            'name'          => 'UI/UX',
            'slug'          => 'ui-ux',
        ]);

        Category::create([
            'name'          => 'Cloud',
            'slug'          => 'cloud',
        ]);

        Category::create([
            'name'          => 'IoT',
            'slug'          => 'iot',
        ]);

    }
}
