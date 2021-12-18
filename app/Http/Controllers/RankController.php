<?php

namespace App\Http\Controllers;

use App\Http\Requests\RankStoreRequest;
use App\Http\Requests\RankUpdateRequest;
use App\Models\Rank;
use Illuminate\Http\Request;

class RankController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ranks = Rank::all();

        return view('rank.index', compact('ranks'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('rank.create');
    }

    /**
     * @param \App\Http\Requests\RankStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(RankStoreRequest $request)
    {
        $rank = Rank::create($request->validated());

        $request->session()->flash('rank.id', $rank->id);

        return redirect()->route('rank.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Rank $rank)
    {
        return view('rank.show', compact('rank'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Rank $rank)
    {
        return view('rank.edit', compact('rank'));
    }

    /**
     * @param \App\Http\Requests\RankUpdateRequest $request
     * @param \App\Models\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function update(RankUpdateRequest $request, Rank $rank)
    {
        $rank->update($request->validated());

        $request->session()->flash('rank.id', $rank->id);

        return redirect()->route('rank.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Rank $rank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Rank $rank)
    {
        $rank->delete();

        return redirect()->route('rank.index');
    }
}
