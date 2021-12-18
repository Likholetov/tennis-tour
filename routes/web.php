<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(
    ['register' => false]
);

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\MainController::class, 'about'])->name('about');
Route::get('/calendar', [App\Http\Controllers\MainController::class, 'calendar'])->name('calendar');
Route::get('/contacts', [App\Http\Controllers\MainController::class, 'contacts'])->name('contacts');
Route::get('/galleries', [App\Http\Controllers\MainController::class, 'galleries'])->name('galleries');
Route::get('/glory', [App\Http\Controllers\MainController::class, 'glory'])->name('glory');
Route::get('/news', [App\Http\Controllers\MainController::class, 'news'])->name('news');
Route::get('/post/{post}', [App\Http\Controllers\MainController::class, 'post'])->name('post');
Route::get('/schedule', [App\Http\Controllers\MainController::class, 'schedule'])->name('schedule');
Route::get('/players', [App\Http\Controllers\MainController::class, 'players'])->name('players');
Route::get('/player/{player}', [App\Http\Controllers\MainController::class, 'player'])->name('player');
Route::get('/gallery/{gallery}', [App\Http\Controllers\MainController::class, 'gallery'])->name('gallery');

Route::group(['prefix' => 'api'], function () {
    Route::get('/players', [App\Http\Controllers\PlayerController::class, 'players'])->name('api.players');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'calendar'])->name('admin');
    Route::get('/stat', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.stat');
    Route::resource('player', App\Http\Controllers\PlayerController::class)->except(['show']);
    Route::resource('gallery', App\Http\Controllers\GalleryController::class)->except(['show']);
    Route::resource('image', App\Http\Controllers\ImageController::class)->except(['show']);
    Route::resource('post', App\Http\Controllers\PostController::class)->except(['show']);
    //Route::get('/tournament/date/{date}', [App\Http\Controllers\TournamentController::class, 'tournamentDate'])->name('tournament.date');
    Route::get('/tournament/groups/{tournament}', [App\Http\Controllers\TournamentController::class, 'groups'])->name('tournament.groups');
    Route::resource('tournament', App\Http\Controllers\TournamentController::class);
    Route::resource('rank', App\Http\Controllers\RankController::class);
    Route::resource('category', App\Http\Controllers\CategoryController::class);
});

Route::get('/one-galleries', function () {
   return view('one-galleries');
});