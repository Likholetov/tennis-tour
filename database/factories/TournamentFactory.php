<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Tournament;

class TournamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tournament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'started_at' => $this->faker->dateTime(),
            'ended_at' => $this->faker->dateTime(),
            'title' => $this->faker->sentence(4),
            'category_id' => $this->faker->randomNumber(),
            'rank' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
