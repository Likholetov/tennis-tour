<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
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
        $galleries = Gallery::withCount('images')->having('images_count', '>', 0)->get();

        return view('galleries', compact('galleries'));
    }

    public function glory()
    {
        return view('glory');
    }

    public function news()
    {
        $posts = Post::all()->take(5);;

        return view('news', compact('posts'));
    }

    public function post(Post $post)
    {
        $posts = Post::where('id', '!=', $post->id)->get()->take(6);

        return view('post', compact('post', 'posts'));
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
