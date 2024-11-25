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
            'slug'          => 'Machine Learning',
            'name'          => 'machine-learning',
        ]);

        Category::create([
            'slug'          => 'Web Development',
            'name'          => 'web-development',
        ]);
        
        Category::create([
            'slug'          => 'Network and Cyber Security',
            'name'          => 'network-and-cyber-security',
        ]);
        
        Category::create([
            'slug'          => 'Mobile Development',
            'name'          => 'mobile-development',
        ]);
        
        Category::create([
            'slug'          => 'UI/UX',
            'name'          => 'ui-ux',
        ]);
        
        Category::create([
            'slug'          => 'Cloud',
            'name'          => 'cloud',
        ]);
        
        Category::create([
            'slug'          => 'IoT',
            'name'          => 'iot',
        ]);
        
    }
}
