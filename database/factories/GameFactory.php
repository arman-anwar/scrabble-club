<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GameFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'player1_id' => rand(1,100),
            'player1_score' => rand(1,100),
            'player2_id' => rand(1,100),
            'player2_score' => rand(1,100),
            'game_date' => $this->faker->date(),
            'game_venue' => $this->faker->city(),
            //
        ];
    }
}
