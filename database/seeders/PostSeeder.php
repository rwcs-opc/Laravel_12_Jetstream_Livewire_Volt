<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first user in the database
        $user = User::first();

        if (!$user) {
            $this->command->warn('⚠️ No user found. Please seed users first.');
            return;
        }

        // Create 5 posts for this user
        Post::factory()->count(500)->create([
            'user_id' => $user->id,
        ]);

        $this->command->info('✅ Created 500 posts for user: ' . $user->email);
    }
}
