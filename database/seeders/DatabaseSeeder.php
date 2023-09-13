<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Categorie;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Categorie::truncate();
        Post::truncate();

        $user = User::factory()->create();
        // Categorie::factory(5)->create();
        Post::factory(50)->create([
            'user_id' => $user->id, 
        ]);
    }
}
