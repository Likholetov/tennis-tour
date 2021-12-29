<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\TennisMatch;

class TennisMatchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TennisMatch::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'expected_court' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'court' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'title' => $this->faker->sentence(4),
            'tournament_id' => $this->faker->randomNumber(),
            'score' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'warm_up' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'start' => $this->faker->regexify('[A-Za-z0-9]{10}'),
            'end' => $this->faker->regexify('[A-Za-z0-9]{10}'),
        ];
    }
}
