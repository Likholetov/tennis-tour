<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function calendar()
    {
        $tournaments = Tournament::where('started_at', '>=', Carbon::today()->subHours(3))->get()->groupBy('title');

        return view('admin.calendar', compact('tournaments'));
    }
}
