<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Post;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "post_title" => $this->faker->sentence(),
            "post_text" => $this->faker->realText(100),
            "magic_card_id" => \App\Models\MagicCard::inRandomOrder()->first()->id,
            "user_id" => \App\Models\User::inRandomOrder()->first()->id,
        ];
    }
}
