<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(AuthorsSeeder::class);
        $this->command->info('Authors table seeded!');


        $this->call(MediaSeeder::class);
        $this->command->info('Media table seeded!');


        $this->call(PostsSeeder::class);
        $this->command->info('Posts table seeded!');
    }
}
