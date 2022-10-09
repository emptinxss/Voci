<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //CUSTOM POSTS

        Post::create([
            'post_name' => 'Happiness',
            'author_id' => '1',
            'media_id' => '1',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Post::create([
            'post_name' => 'Sand and clouds',
            'author_id' => '2',
            'media_id' => '2',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')

        ]);
        Post::create([
            'post_name' => 'Tea',
            'author_id' => '1',
            'media_id' => '3',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
