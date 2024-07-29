<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    $user = User::all();

    
        Post::factory(20)
        //  -> Sequence(fn ()=>   [
        //     'user_id' => $user->random()
        // ])
        ->create();

    }
}
