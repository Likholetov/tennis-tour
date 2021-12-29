<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TennisMatch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TennisMatchController
 */
class TennisMatchControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $tennisMatches = TennisMatch::factory()->count(3)->create();

        $response = $this->get(route('tennis-match.index'));

        $response->assertOk();
        $response->assertViewIs('tennisMatch.index');
        $response->assertViewHas('tennisMatches');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('tennis-match.create'));

        $response->assertOk();
        $response->assertViewIs('tennisMatch.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TennisMatchController::class,
            'store',
            \App\Http\Requests\TennisMatchStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $tournament_id = $this->faker->randomNumber();

        $response = $this->post(route('tennis-match.store'), [
            'tournament_id' => $tournament_id,
        ]);

        $tennisMatches = TennisMatch::query()
            ->where('tournament_id', $tournament_id)
            ->get();
        $this->assertCount(1, $tennisMatches);
        $tennisMatch = $tennisMatches->first();

        $response->assertRedirect(route('tennisMatch.index'));
        $response->assertSessionHas('tennisMatch.id', $tennisMatch->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $tennisMatch = TennisMatch::factory()->create();

        $response = $this->get(route('tennis-match.show', $tennisMatch));

        $response->assertOk();
        $response->assertViewIs('tennisMatch.show');
        $response->assertViewHas('tennisMatch');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $tennisMatch = TennisMatch::factory()->create();

        $response = $this->get(route('tennis-match.edit', $tennisMatch));

        $response->assertOk();
        $response->assertViewIs('tennisMatch.edit');
        $response->assertViewHas('tennisMatch');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TennisMatchController::class,
            'update',
            \App\Http\Requests\TennisMatchUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $tennisMatch = TennisMatch::factory()->create();
        $tournament_id = $this->faker->randomNumber();

        $response = $this->put(route('tennis-match.update', $tennisMatch), [
            'tournament_id' => $tournament_id,
        ]);

        $tennisMatch->refresh();

        $response->assertRedirect(route('tennisMatch.index'));
        $response->assertSessionHas('tennisMatch.id', $tennisMatch->id);

        $this->assertEquals($tournament_id, $tennisMatch->tournament_id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $tennisMatch = TennisMatch::factory()->create();

        $response = $this->delete(route('tennis-match.destroy', $tennisMatch));

        $response->assertRedirect(route('tennisMatch.index'));

        $this->assertDeleted($tennisMatch);
    }
}
