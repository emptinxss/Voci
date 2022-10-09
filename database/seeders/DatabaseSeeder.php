<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //CUSTOM AUTHORS

        DB::table('authors')->insert([
            'name' => 'Emma',
            'surname' => 'Miller'
        ]);
        DB::table('authors')->insert([
            'name' => 'Mia',
            'surname' => 'Jackson'
        ]);

        // CUSTOM MEDIA

        DB::table('media')->insert([
            'name' => 'Dance',
            'category' => 'IMG',
            'description' => 'Whatever is good for your soul, do that...',
            'file' => '1665301795.jpg'
        ]);
        DB::table('media')->insert([
            'name' => 'Sand ',
            'category' => 'IMG',
            'description' => 'Beautiful place...',
            'file' => '1665301907.jpg'
        ]);
        DB::table('media')->insert([
            'name' => 'Tea',
            'category' => 'VIDEO',
            'description' => 'There is no better way to start the day with a gooog cup of tea!',
            'file' => '1665302372.mp4'
        ]);

        //CUSTOM POSTS

        DB::table('posts')->insert([
            'post_name' => 'Happiness',
            'author_id' => '1',
            'media_id' => '1'
        ]);
        DB::table('posts')->insert([
            'post_name' => 'Sand and clouds',
            'author_id' => '2',
            'media_id' => '2'
        ]);
        DB::table('posts')->insert([
            'post_name' => 'Tea',
            'author_id' => '1',
            'media_id' => '3'
        ]);
    }
}
