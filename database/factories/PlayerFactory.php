<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Player;

class PlayerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Player::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'patronymic' => $this->faker->regexify('[A-Za-z0-9]{30}'),
            'surname' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'gender' => $this->faker->randomElement(["\u043d\u0435 \u0443\u043a\u0430\u0437\u0430\u043d","\u043c\u0443\u0436\u0441\u043a\u043e\u0439","\u0436\u0435\u043d\u0441\u043a\u0438\u0439"]),
            'city' => $this->faker->city,
            'region' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'birth' => $this->faker->date(),
            'level' => $this->faker->numberBetween(-10000, 10000),
            'start_playing_year' => $this->faker->numberBetween(-10000, 10000),
            'start_tournament_year' => $this->faker->numberBetween(-10000, 10000),
            'start_tournament_month' => $this->faker->numberBetween(-10000, 10000),
            'racket_firm' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'racket_model' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'best_position_single' => $this->faker->numberBetween(-10000, 10000),
            'best_position_single_date' => $this->faker->date(),
            'best_position_pair' => $this->faker->numberBetween(-10000, 10000),
            'best_position_pair_date' => $this->faker->date(),
            'partner_id' => $this->faker->word,
        ];
    }
}
