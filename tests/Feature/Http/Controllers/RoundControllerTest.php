<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Round;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RoundController
 */
class RoundControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $rounds = Round::factory()->count(3)->create();

        $response = $this->get(route('round.index'));

        $response->assertOk();
        $response->assertViewIs('round.index');
        $response->assertViewHas('rounds');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('round.create'));

        $response->assertOk();
        $response->assertViewIs('round.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoundController::class,
            'store',
            \App\Http\Requests\RoundStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $order = $this->faker->numberBetween(-10000, 10000);
        $tournament_id = $this->faker->randomNumber();
        $collapsed = $this->faker->boolean;

        $response = $this->post(route('round.store'), [
            'order' => $order,
            'tournament_id' => $tournament_id,
            'collapsed' => $collapsed,
        ]);

        $rounds = Round::query()
            ->where('order', $order)
            ->where('tournament_id', $tournament_id)
            ->where('collapsed', $collapsed)
            ->get();
        $this->assertCount(1, $rounds);
        $round = $rounds->first();

        $response->assertRedirect(route('round.index'));
        $response->assertSessionHas('round.id', $round->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $round = Round::factory()->create();

        $response = $this->get(route('round.show', $round));

        $response->assertOk();
        $response->assertViewIs('round.show');
        $response->assertViewHas('round');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $round = Round::factory()->create();

        $response = $this->get(route('round.edit', $round));

        $response->assertOk();
        $response->assertViewIs('round.edit');
        $response->assertViewHas('round');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RoundController::class,
            'update',
            \App\Http\Requests\RoundUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $round = Round::factory()->create();
        $order = $this->faker->numberBetween(-10000, 10000);
        $tournament_id = $this->faker->randomNumber();
        $collapsed = $this->faker->boolean;

        $response = $this->put(route('round.update', $round), [
            'order' => $order,
            'tournament_id' => $tournament_id,
            'collapsed' => $collapsed,
        ]);

        $round->refresh();

        $response->assertRedirect(route('round.index'));
        $response->assertSessionHas('round.id', $round->id);

        $this->assertEquals($order, $round->order);
        $this->assertEquals($tournament_id, $round->tournament_id);
        $this->assertEquals($collapsed, $round->collapsed);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $round = Round::factory()->create();

        $response = $this->delete(route('round.destroy', $round));

        $response->assertRedirect(route('round.index'));

        $this->assertDeleted($round);
    }
}
