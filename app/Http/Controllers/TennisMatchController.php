<?php

namespace App\Http\Controllers;

use App\Http\Requests\TennisMatchStoreRequest;
use App\Http\Requests\TennisMatchUpdateRequest;
use App\Models\TennisMatch;
use Illuminate\Http\Request;

class TennisMatchController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tennisMatches = TennisMatch::all();

        return view('tennisMatch.index', compact('tennisMatches'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('tennisMatch.create');
    }

    /**
     * @param \App\Http\Requests\TennisMatchStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TennisMatchStoreRequest $request)
    {
        $tennisMatch = TennisMatch::create($request->validated());

        $request->session()->flash('tennisMatch.id', $tennisMatch->id);

        return redirect()->route('tennisMatch.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TennisMatch $tennisMatch
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, TennisMatch $tennisMatch)
    {
        return view('tennisMatch.show', compact('tennisMatch'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TennisMatch $tennisMatch
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, TennisMatch $tennisMatch)
    {
        return view('tennisMatch.edit', compact('tennisMatch'));
    }

    /**
     * @param \App\Http\Requests\TennisMatchUpdateRequest $request
     * @param \App\Models\TennisMatch $tennisMatch
     * @return \Illuminate\Http\Response
     */
    public function update(TennisMatchUpdateRequest $request, TennisMatch $tennisMatch)
    {
        $tennisMatch->update($request->validated());

        $request->session()->flash('tennisMatch.id', $tennisMatch->id);

        return redirect()->route('tennisMatch.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\TennisMatch $tennisMatch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, TennisMatch $tennisMatch)
    {
        $tennisMatch->delete();

        return redirect()->route('tennisMatch.index');
    }
}
