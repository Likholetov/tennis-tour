<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TournamentController
 */
class TournamentControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tournaments = Tournament::factory()->count(3)->create();

        $response = $this->get(route('tournament.index'));

        $response->assertOk();
        $response->assertViewIs('tournament.index');
        $response->assertViewHas('tournaments');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('tournament.create'));

        $response->assertOk();
        $response->assertViewIs('tournament.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TournamentController::class,
            'store',
            \App\Http\Requests\TournamentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $started_at = $this->faker->dateTime();
        $ended_at = $this->faker->dateTime();
        $title = $this->faker->sentence(4);
        $category_id = $this->faker->randomNumber();
        $rank = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('tournament.store'), [
            'started_at' => $started_at,
            'ended_at' => $ended_at,
            'title' => $title,
            'category_id' => $category_id,
            'rank' => $rank,
        ]);

        $tournaments = Tournament::query()
            ->where('started_at', $started_at)
            ->where('ended_at', $ended_at)
            ->where('title', $title)
            ->where('category_id', $category_id)
            ->where('rank', $rank)
            ->get();
        $this->assertCount(1, $tournaments);
        $tournament = $tournaments->first();

        $response->assertRedirect(route('tournament.index'));
        $response->assertSessionHas('tournament.id', $tournament->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $tournament = Tournament::factory()->create();

        $response = $this->get(route('tournament.show', $tournament));

        $response->assertOk();
        $response->assertViewIs('tournament.show');
        $response->assertViewHas('tournament');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $tournament = Tournament::factory()->create();

        $response = $this->get(route('tournament.edit', $tournament));

        $response->assertOk();
        $response->assertViewIs('tournament.edit');
        $response->assertViewHas('tournament');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TournamentController::class,
            'update',
            \App\Http\Requests\TournamentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $tournament = Tournament::factory()->create();
        $started_at = $this->faker->dateTime();
        $ended_at = $this->faker->dateTime();
        $title = $this->faker->sentence(4);
        $category_id = $this->faker->randomNumber();
        $rank = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('tournament.update', $tournament), [
            'started_at' => $started_at,
            'ended_at' => $ended_at,
            'title' => $title,
            'category_id' => $category_id,
            'rank' => $rank,
        ]);

        $tournament->refresh();

        $response->assertRedirect(route('tournament.index'));
        $response->assertSessionHas('tournament.id', $tournament->id);

        $this->assertEquals($started_at, $tournament->started_at);
        $this->assertEquals($ended_at, $tournament->ended_at);
        $this->assertEquals($title, $tournament->title);
        $this->assertEquals($category_id, $tournament->category_id);
        $this->assertEquals($rank, $tournament->rank);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $tournament = Tournament::factory()->create();

        $response = $this->delete(route('tournament.destroy', $tournament));

        $response->assertRedirect(route('tournament.index'));

        $this->assertDeleted($tournament);
    }
}
