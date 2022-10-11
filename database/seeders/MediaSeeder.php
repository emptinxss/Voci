<?php

namespace Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // CUSTOM MEDIA

        Media::create([
            'name' => 'Dance',
            'category' => 'IMG',
            'description' => 'Whatever is good for your soul, do that...',
            'file' => '1665301795.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Media::create([
            'name' => 'Sand ',
            'category' => 'IMG',
            'description' => 'Beautiful place...',
            'file' => '1665301907.jpg',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        Media::create([
            'name' => 'Tea',
            'category' => 'VIDEO',
            'description' => 'There is no better way to start the day with a gooog cup of tea!',
            'file' => '1665302372.mp4',
            'created_at' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
