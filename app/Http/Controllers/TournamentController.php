<?php

namespace App\Http\Controllers;

use App\Http\Requests\TournamentStoreRequest;
use App\Http\Requests\TournamentUpdateRequest;
use App\Models\Category;
use App\Models\Group;
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
        $tournament = new Tournament();
        $tournament->title = $request->title;
        $tournament->category_id = $request->category_id;
        $tournament->rank = $request->rank;
        $tournament->place = $request->place;
        $tournament->started_at = Carbon::parse($request->started_at);
        $tournament->ended_at = Carbon::parse($request->ended_at);
        $tournament->save();

        $attachedPlayers = [];

        if ($request->is_groups == true) {

            $tournament->is_groups = $request->is_groups;
            $tournament->group_amount = $request->group_amount;
            $tournament->save();

            foreach ($request->groups as $group) {
                $currentGroup = new Group();
                $currentGroup->title = $group['name'];
                $currentGroup->tournament_id = $tournament->id;
                $currentGroup->save();

                foreach ($group['players'] as $player) {

                    if (!$player) {
                        continue;
                    }

                    array_push($attachedPlayers, $player);

                    if ($player['code'] != 0) {
                        $currentGroup->players()->attach($player['code']);
                        $tournament->players()->attach($player['code']);
                    } else {
                        $fioArray = explode(" ", $player['label']);

                        $newPlayer = new Player();
                        $newPlayer->surname = $fioArray[0];
                        $newPlayer->name = $fioArray[1];
                        $newPlayer->patronymic = $fioArray[2];
                        $newPlayer->save();

                        $currentGroup->players()->attach($newPlayer->id);
                        $tournament->players()->attach($newPlayer->id);
                    }
                }
            }
        }

        foreach ($request->players as $player) {
            if ($this->existsInArray($player, $attachedPlayers)) {
                continue;
            }

            if ($player['code'] != 0) {
                $tournament->players()->attach($player['code']);

                continue;
            }

            $fioArray = explode(" ", $player['label']);

            $newPlayer = new Player();
            $newPlayer->surname = $fioArray[0];
            $newPlayer->name = $fioArray[1];
            $newPlayer->patronymic = $fioArray[2];
            $newPlayer->save();

            $tournament->players()->attach($newPlayer->id);
        }

        return $tournament;
    }

    private function existsInArray($entry, $array) {
        foreach ($array as $compare) {
            if (strcmp($compare['code'], "0") == 0) {  
                if (strcmp($compare['label'], $entry['label']) == 0) {
                    
                    return true;
                }
            } else {
                if ($compare['code'] == $entry['code']) {
                    return true;
                }
            }        
        }
        return false;
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
        $participants = $tournament->players;
        $groupsCount = $tournament->groups->count();

        $date = Carbon::now();
        $categories = Category::all();
        $players = Player::all();

        return view('tournament.edit', compact('tournament', 'date', 'categories', 'players', 'participants', 'groupsCount'));
    }

    /**
     * @param \App\Http\Requests\TournamentUpdateRequest $request
     * @param \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function update(TournamentUpdateRequest $request, Tournament $tournament)
    {
        $tournament->title = $request->title;
        $tournament->category_id = $request->category_id;
        $tournament->rank = $request->rank;
        $tournament->place = $request->place;
        $tournament->started_at = Carbon::parse($request->started_at);
        $tournament->ended_at = Carbon::parse($request->ended_at);
        $tournament->save();

        $tournament->players()->detach();
        $tournament->groups()->delete();

        $attachedPlayers = [];

        if ($request->is_groups == true) {

            $tournament->is_groups = $request->is_groups;
            $tournament->group_amount = $request->group_amount;
            $tournament->save();

            foreach ($request->groups as $group) {
                $currentGroup = new Group();
                $currentGroup->title = $group['name'];
                $currentGroup->tournament_id = $tournament->id;
                $currentGroup->save();

                foreach ($group['players'] as $player) {

                    if (!$player) {
                        continue;
                    }

                    array_push($attachedPlayers, $player);

                    if ($player['code'] != 0) {
                        $currentGroup->players()->attach($player['code']);
                        $tournament->players()->attach($player['code']);
                    } else {
                        $fioArray = explode(" ", $player['label']);

                        $newPlayer = new Player();
                        $newPlayer->surname = $fioArray[0];
                        $newPlayer->name = $fioArray[1];
                        $newPlayer->patronymic = $fioArray[2];
                        $newPlayer->save();

                        $currentGroup->players()->attach($newPlayer->id);
                        $tournament->players()->attach($newPlayer->id);
                    }
                }
            }
        }

        foreach ($request->players as $player) {
            if ($this->existsInArray($player, $attachedPlayers)) {
                continue;
            }

            if ($player['code'] != 0) {
                $tournament->players()->attach($player['code']);

                continue;
            }

            $fioArray = explode(" ", $player['label']);

            $newPlayer = new Player();
            $newPlayer->surname = $fioArray[0];
            $newPlayer->name = $fioArray[1];
            $newPlayer->patronymic = $fioArray[2];
            $newPlayer->save();

            $tournament->players()->attach($newPlayer->id);
        }

        return $tournament;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Tournament $tournament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Tournament $tournament)
    {
        $tournament->delete();

        return redirect()->route('admin.calendar');
    }

    public function tournamentDate($date)
    {
        $dateParsed = Carbon::createFromFormat('d-m-Y', $date);
        $date = $dateParsed->format('Y-m-d');
        
        $categories = Category::all();
        $players = Player::all();

        return view('tournament.create', compact('date', 'categories', 'players'));
    }

    public function groups(Tournament $tournament)
    {
        return view('tournament.groups', compact('tournament'));
    }
}
