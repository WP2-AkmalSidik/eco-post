<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Post;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('akml1234'),
            'role' => 'admin',
            'bio' => $faker->sentence(20),
        ]);

        // User biasa
        User::create([
            'name' => 'Jhon Cenat',
            'email' => 'Jhon@eco.com',
            'password' => Hash::make('password12'),
            'role' => 'user',
            'bio' => $faker->sentence(20),
        ]);
        User::create([
            'name' => 'Akmal Sidik',
            'email' => 'akml@eco.com',
            'password' => Hash::make('password12'),
            'role' => 'user',
            'bio' => $faker->sentence(20),
        ]);

        // Kategori
        $categories = ['Technologi', 'lifestyle', 'Kesehatan', 'Otomotif', 'Olahraga'];
        foreach ($categories as $cat) {
            Categorie::create([
                'name' => $cat,
                'slug' => Str::slug($cat),
            ]);
        }
    }
}
