<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Nette\Utils\Random;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // $user=User::all();
        // $user_id= $user->random();
        return [
            'title' =>fake()->word(3,true),
            'content'=>fake()->paragraph(5, true),
            'image'=>"post/".fake()->image("public/storage/post", 640, 480,  null, false),
            'user_id'=>1,
        ];
    }
}
