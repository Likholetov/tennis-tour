<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerStoreRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Http\Resources\PlayerCollection;
use App\Models\Player;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('players');
    }
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $players = Player::all();

        // return new PlayerCollection($players);
        $players = Player::simplePaginate(10);

        return view('player.index', compact('players'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('player.create');
    }

    /**
     * @param \App\Http\Requests\PlayerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerStoreRequest $request)
    {
        $player = Player::create($request->validated());

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images/players/' . $player->id, $filename, 'public');
            $player->update(['img_url' => "/storage/images/players/" . $player->id . "/" . $filename]);
        }

        //$request->session()->flash('player.id', $player->id);

        return redirect()->route('player.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Player $player)
    {
        //
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Player $player)
    {
        return view('player.edit', compact('player'));
    }

    /**
     * @param \App\Http\Requests\PlayerUpdateRequest $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerUpdateRequest $request, Player $player)
    {
        $player->update($request->validated());

        if ($request->hasFile('image')) {
            $filename = $request->image->getClientOriginalName();
            if (Storage::exists('public/images/players/' . $player->id)) {
                $files = Storage::allFiles('public/images/players/' . $player->id);
                Storage::delete($files);
            }
            $request->image->storeAs('images/players/' . $player->id, $filename, 'public');
            $player->update(['img_url' => "/storage/images/players/" . $player->id . "/" . $filename]);
        }

        //$request->session()->flash('player.id', $player->id);

        return redirect()->route('player.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Player $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Player $player)
    {
        $player->delete();
        if (Storage::exists('public/images/players/' . $player->id)) {
            Storage::deleteDirectory('public/images/players/' . $player->id);
        }
        return redirect()->route('player.index');
    }

    public function players(Request $request)
    {
        $filters = (object) [
            'fio' => $request->fio,
            'level' => $request->level,
            'city' => $request->city
        ];

        $per_page = $request->get('per_page', 10);

        $players = Player::withFilters(
            $filters
        )->orderByRaw('surname DESC')->paginate($per_page);

        return new PlayerCollection($players);
    }

    public function isPlayerExists(Request $request)
    {
        $user = Player::where('name', $request->name)->where('patronymic', $request->patronymic)->where('surname', $request->surname)->first();

        if (!$user) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        return $user;
    }
}
