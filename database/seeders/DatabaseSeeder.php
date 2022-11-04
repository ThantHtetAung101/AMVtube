<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Amv;
use App\Models\User;
use App\Models\Subscription;
use App\Models\Category;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Amv::factory()->count(20)->create();
        Category::factory()->create([
            "name" => "Classic",
        ]);
        Category::factory()->create([
            "name" => "Vibe",
        ]);
        Category::factory()->create([
            "name" => "VFX",
        ]);
        Category::factory()->create([
            "name" => "Flow",
        ]);
        Category::factory()->create([
            "name" => "Glitch",
        ]);
        Category::factory()->create([
            "name" => "Typography",
        ]);
        Comment::factory()->count(30)->create();
        User::factory()->create([
            "name" => "Alice",
            "email" => "alice@gmail.com",
            "password" => Hash::make("password"),
        ]);
        User::factory()->create([
            "name" => "Bob",
            "email" => "bob@gmail.com",
            "password" => Hash::make("password"),
        ]);
        User::factory()->create([
            "name" => "John",
            "email" => "john@gmail.com",
            "password" => Hash::make("password"),
        ]);
        User::factory()->create([
            "name" => "Doe",
            "email" => "doe@gmail.com",
            "password" => Hash::make("password"),
        ]);
        User::factory()->create([
            "name" => "Mike",
            "email" => "mike@gmail.com",
            "password" => Hash::make("password"),
        ]);
    }
}
