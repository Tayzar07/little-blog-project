<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $tayzar = User::factory()->create([
            'name' => 'tayzar',
            'password'=>'12345678',
            'email' => 'tayzar@example.com',
        ]);

        $zawzaw = User::factory()->create([
            'name' => 'zaw zaw',
            'email' => 'zawzaw@example.com',
        ]);

        $kyawkyaw = User::factory()->create([
            'name' => 'kyaw kyaw',
            'email' => 'kyawkyaw@example.com',
        ]);

        $laravel = Category::factory()->create([
            'name' => 'Laravel',
            'slug' => 'laravel'
        ]);

        $react = Category::factory()->create([
            'name' => 'React',
            'slug' => 'react'
        ]);

        $vue = Category::factory()->create([
            'name' => 'Vue',
            'slug' => 'vue'
        ]);

        Blog::factory(6)->create([
            'category_id' => $laravel->id,
            'user_id' => $tayzar->id,
        ]);

        Blog::factory(6)->create([
            'category_id' => $react->id,
            'user_id' => $zawzaw->id,
        ]);

        Blog::factory(6)->create([
            'category_id' => $vue->id,
            'user_id' => $kyawkyaw->id,
        ]);
    }
}
