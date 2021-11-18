<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Player;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PlayerController
 */
class PlayerControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $players = Player::factory()->count(3)->create();

        $response = $this->get(route('player.index'));

        $response->assertOk();
        $response->assertViewIs('player.index');
        $response->assertViewHas('players');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('player.create'));

        $response->assertOk();
        $response->assertViewIs('player.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PlayerController::class,
            'store',
            \App\Http\Requests\PlayerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $name = $this->faker->name;
        $patronymic = $this->faker->word;
        $surname = $this->faker->word;
        $gender = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->post(route('player.store'), [
            'name' => $name,
            'patronymic' => $patronymic,
            'surname' => $surname,
            'gender' => $gender,
        ]);

        $players = Player::query()
            ->where('name', $name)
            ->where('patronymic', $patronymic)
            ->where('surname', $surname)
            ->where('gender', $gender)
            ->get();
        $this->assertCount(1, $players);
        $player = $players->first();

        $response->assertRedirect(route('player.index'));
        $response->assertSessionHas('player.id', $player->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $player = Player::factory()->create();

        $response = $this->get(route('player.show', $player));

        $response->assertOk();
        $response->assertViewIs('player.show');
        $response->assertViewHas('player');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $player = Player::factory()->create();

        $response = $this->get(route('player.edit', $player));

        $response->assertOk();
        $response->assertViewIs('player.edit');
        $response->assertViewHas('player');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\PlayerController::class,
            'update',
            \App\Http\Requests\PlayerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $player = Player::factory()->create();
        $name = $this->faker->name;
        $patronymic = $this->faker->word;
        $surname = $this->faker->word;
        $gender = $this->faker->randomElement(/** enum_attributes **/);

        $response = $this->put(route('player.update', $player), [
            'name' => $name,
            'patronymic' => $patronymic,
            'surname' => $surname,
            'gender' => $gender,
        ]);

        $player->refresh();

        $response->assertRedirect(route('player.index'));
        $response->assertSessionHas('player.id', $player->id);

        $this->assertEquals($name, $player->name);
        $this->assertEquals($patronymic, $player->patronymic);
        $this->assertEquals($surname, $player->surname);
        $this->assertEquals($gender, $player->gender);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $player = Player::factory()->create();

        $response = $this->delete(route('player.destroy', $player));

        $response->assertRedirect(route('player.index'));

        $this->assertDeleted($player);
    }
}
