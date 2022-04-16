<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Comment;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "comment_text" => $this->faker->realText(100),
            "post_id" => \App\Models\Post::inRandomOrder()->first()->id,
            "user_id" => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
