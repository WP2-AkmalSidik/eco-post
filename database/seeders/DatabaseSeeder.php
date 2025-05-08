<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('akml1234'),
            'role' => 'admin',
        ]);

        // User biasa
        $user = User::create([
            'name' => 'User Biasa',
            'email' => 'user@example.com',
            'password' => Hash::make('password12'),
            'role' => 'user',
        ]);

        // Kategori
        $categories = ['Laravel', 'PHP', 'Tailwind', 'News'];
        foreach ($categories as $cat) {
            Categorie::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }

        // Post Dummy
        $post = Post::create([
            'user_id' => $user->id,
            'title' => 'Contoh Post Laravel',
            'slug' => 'contoh-post-laravel',
            'body' => 'Ini adalah isi post contoh tentang Laravel.',
            'image_path' => null
        ]);

        // Assign ke kategori
        $post->categories()->attach([1, 2]); // Laravel dan PHP
    }
}
