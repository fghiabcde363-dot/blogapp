<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        Post::create([
            'title' => 'Hello Blogify!',
            'content' => 'Ini adalah artikel pertama di Blogify.',
            'status' => 'published',
            'user_id' => 2, 
            'category_id' => 1, 
        ]);

        Post::create([
            'title' => 'Belajar Laravel',
            'content' => 'Laravel itu powerful banget untuk bikin web app.',
            'status' => 'published',
            'user_id' => 2,
            'category_id' => 3, 
        ]);
    }
}

