<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory(10)->create();
        \App\Models\User::factory(10)->create()->each(function($user) {
        \App\Models\Post::factory(rand(1, 3))->create([
                'user_id' => $user->id
            ]);
        });

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
