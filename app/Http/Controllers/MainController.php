<?php

namespace App\Http\Controllers;

use App\Models\Player;
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

    public function gallery()
    {
        return view('gallery');
    }

    public function glory()
    {
        return view('glory');
    }

    public function news()
    {
        return view('news');
    }

    public function schedule()
    {
        return view('schedule');
    }

    public function players()
    {
        $players = Player::all();

        return view('players', compact('players'));
    }

    public function player()
    {
        return view('player');
    }
}
