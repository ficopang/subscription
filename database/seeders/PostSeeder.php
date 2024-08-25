<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $website = Website::first();

        Post::create([
            'website_id' => $website->id,
            'title' => 'Welcome to Tech Blog',
            'description' => 'First post on Tech Blog',
        ]);

        Post::create([
            'website_id' => $website->id,
            'title' => 'Second Post',
            'description' => 'Another post on Tech Blog',
        ]);
    }
}
