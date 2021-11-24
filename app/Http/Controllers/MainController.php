<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function calendar()
    {
        return view('calendar');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function galleries()
    {
        return view('galleries');
    }

    public function glory()
    {
        return view('glory');
    }

    public function news()
    {
        return view('news');
    }

    public function post(Post $post)
    {
        return view('post', compact('post'));
    }

    public function schedule()
    {
        return view('schedule');
    }

    public function players()
    {
        $date1 = Carbon::now()->addHours(3)->addDay()->toDateString();
        $date2 = Carbon::now()->addHours(3)->addDay(8)->toDateString();

        $today = Player::whereDate('birth', Carbon::now()->addHours(3))->get();
        $week = Player::whereBetween('birth', [$date1, $date2])->get();;

        return view('players', compact('today', 'week'));
    }

    public function player(Player $player)
    {
        return view('player', compact('player'));
    }
}
