<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Round;

class RoundFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Round::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order' => $this->faker->numberBetween(-10000, 10000),
            'tournament_id' => $this->faker->randomNumber(),
            'collapsed' => $this->faker->boolean,
        ];
    }
}
