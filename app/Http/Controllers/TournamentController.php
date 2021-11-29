<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentStoreRequest;
use App\Http\Requests\TournamentUpdateRequest;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tournaments = Tournament::all();

        return view('tournament.index', compact('tournaments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tournament.create');
    }

    /**
     * @param \App\Http\Requests\TournamentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TournamentStoreRequest $request)
    {
        $tournament = Tournament::create($request->validated());

        $request->session()->flash('tournament.id', $tournament->id);

        return redirect()->route('tournament.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Tournament $tournament)
    {
        return view('tournament.show', compact('tournament'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Tournament $tournament)
    {
        return view('tournament.edit', compact('tournament'));
    }

    /**
     * @param \App\Http\Requests\TournamentUpdateRequest $request
     * @param \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(TournamentUpdateRequest $request, Tournament $tournament)
    {
        $tournament->update($request->validated());

        $request->session()->flash('tournament.id', $tournament->id);

        return redirect()->route('tournament.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('tournament.index');
    }
}
