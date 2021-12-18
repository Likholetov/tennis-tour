<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Rank;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\RankController
 */
class RankControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $ranks = Rank::factory()->count(3)->create();

        $response = $this->get(route('rank.index'));

        $response->assertOk();
        $response->assertViewIs('rank.index');
        $response->assertViewHas('ranks');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('rank.create'));

        $response->assertOk();
        $response->assertViewIs('rank.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RankController::class,
            'store',
            \App\Http\Requests\RankStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $title = $this->faker->sentence(4);

        $response = $this->post(route('rank.store'), [
            'title' => $title,
        ]);

        $ranks = Rank::query()
            ->where('title', $title)
            ->get();
        $this->assertCount(1, $ranks);
        $rank = $ranks->first();

        $response->assertRedirect(route('rank.index'));
        $response->assertSessionHas('rank.id', $rank->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $rank = Rank::factory()->create();

        $response = $this->get(route('rank.show', $rank));

        $response->assertOk();
        $response->assertViewIs('rank.show');
        $response->assertViewHas('rank');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $rank = Rank::factory()->create();

        $response = $this->get(route('rank.edit', $rank));

        $response->assertOk();
        $response->assertViewIs('rank.edit');
        $response->assertViewHas('rank');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\RankController::class,
            'update',
            \App\Http\Requests\RankUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $rank = Rank::factory()->create();
        $title = $this->faker->sentence(4);

        $response = $this->put(route('rank.update', $rank), [
            'title' => $title,
        ]);

        $rank->refresh();

        $response->assertRedirect(route('rank.index'));
        $response->assertSessionHas('rank.id', $rank->id);

        $this->assertEquals($title, $rank->title);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $rank = Rank::factory()->create();

        $response = $this->delete(route('rank.destroy', $rank));

        $response->assertRedirect(route('rank.index'));

        $this->assertDeleted($rank);
    }
}
