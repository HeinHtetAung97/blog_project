<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Article::factory()->count(20)->create();
        Comment::factory()->count(40)->create();

        $list = ['App','Mobile', 'Web', 'Tech', 'Oss'];
        foreach ($list as $name) {
            Category::create(["name" => $name]);
        }

        User::factory()->create([
            'name' => 'Alice',
            'email' => 'alice@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
        ]);
    }
}
