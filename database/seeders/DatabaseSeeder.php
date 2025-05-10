<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name'=> 'Didi',
            'username'=> 'Di',
            'email'=> 'didi28383@gmail.com',
            'password'=> bcrypt('password')
        ]);

        User::factory(5)->create();

        Category::create([
            "name" => "Web Programming",
            "slug" => "web-programming"
        ]);

        Category::create([
            "name" => "Personal",
            "slug" => "personal"
        ]);

        Category::create([
            "name" => "Web Design",
            "slug" => "web-design"
        ]);

        Post::factory(20)->create();
    }
}
