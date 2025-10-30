<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // First seed users (if not already)
        // $this->call(UserSeeder::class);

        // // Then seed posts
        // $this->call(PostSeeder::class);
        $this->call([
            // UserSeeder::class,
            PostSeeder::class,
            AddressSeeder::class,
        ]);
    }
}
