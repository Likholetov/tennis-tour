<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentStoreRequest;
use App\Http\Requests\TournamentUpdateRequest;
use App\Models\Category;
use App\Models\Player;
use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //return Tournament::all();

        $tournaments = Tournament::all();

        return view('tournament.index', compact('tournaments'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $date = Carbon::now();
        $categories = Category::all();
        $players = Player::all();

        return view('tournament.create', compact('date', 'categories', 'players'));
    }

    /**
     * @param \App\Http\Requests\TournamentStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TournamentStoreRequest $request)
    {
        $tournament = new Tournament();//Tournament::create($request->validated());
        $tournament->title = $request->title;
        $tournament->category_id = $request->category_id;
        $tournament->rank = $request->rank;
        $tournament->place = $request->place;
        $tournament->started_at = Carbon::parse($request->started_at);
        $tournament->save();

        //$request->session()->flash('tournament.id', $tournament->id);

        return $tournament;//redirect()->route('tournament.index');
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

        //$request->session()->flash('tournament.id', $tournament->id);

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

    public function tournamentDate($date)
    {
        $dateParsed = Carbon::createFromFormat('d-m-Y', $date);
        $date = $dateParsed->format('Y-m-d');
        
        $categories = Category::all();
        $players = Player::all();

        return view('tournament.create', compact('date', 'categories', 'players'));
    }
}
