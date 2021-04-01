<?php

namespace Database\Seeders;

use App\Models\PostBlog;
use Illuminate\Database\Seeder;

class PostBlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PostBlog::factory()->count(5)->create();
    }
}
