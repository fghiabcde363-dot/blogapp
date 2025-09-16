<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        Category::create(['name' => 'Technology', 'slug' => 'technology']);
        Category::create(['name' => 'Lifestyle', 'slug' => 'lifestyle']);
        Category::create(['name' => 'Education', 'slug' => 'education']);
    }
}
