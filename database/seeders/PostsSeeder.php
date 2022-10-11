<?php

namespace Database\Seeders;

use App\Models\Post;
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

        Post::create([
            'post_name' => 'Happiness',
            'author_id' => '4',
            'media_id' => '4',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        Post::create([
            'post_name' => 'Sand and clouds',
            'author_id' => '14',
            'media_id' => '14',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')

        ]);
        Post::create([
            'post_name' => 'Tea',
            'author_id' => '4',
            'media_id' => '24',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
