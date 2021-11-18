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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\MainController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\MainController::class, 'about'])->name('about');
Route::get('/calendar', [App\Http\Controllers\MainController::class, 'calendar'])->name('calendar');
Route::get('/contacts', [App\Http\Controllers\MainController::class, 'contacts'])->name('contacts');
Route::get('/gallery', [App\Http\Controllers\MainController::class, 'gallery'])->name('gallery');
Route::get('/glory', [App\Http\Controllers\MainController::class, 'glory'])->name('glory');
Route::get('/news', [App\Http\Controllers\MainController::class, 'news'])->name('news');
Route::get('/schedule', [App\Http\Controllers\MainController::class, 'schedule'])->name('schedule');
Route::get('/players', [App\Http\Controllers\MainController::class, 'players'])->name('players');
Route::get('/player/{player}', [App\Http\Controllers\MainController::class, 'player'])->name('player');

Route::group(['prefix' => 'admin'], function () {
    Route::resource('player', App\Http\Controllers\PlayerController::class)->except(['show']);
});
