<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MagicCard;


class MagicCardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "card_name" => $this->faker->firstName(),
            "mana_cost" => $this->faker->numberBetween(1,10),
            "type" => $this->faker->randomElement(["Creature","Artifact","Instant","Sorcery","Enchantment"]),
            "card_text" => $this->faker->realText(100),
            "rarity" => $this->faker->randomElement(["Uncommon","Rare","Mythic Rare"]),
            "power" => $this->faker->numberBetween(0,15),
            "toughness" => $this->faker->numberBetween(0,15),
        ];
    }
}
