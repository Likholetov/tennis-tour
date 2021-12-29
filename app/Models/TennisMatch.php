<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TennisMatch extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expected_court',
        'court',
        'title',
        'tournament_id',
        'player_one_id',
        'player_two_id',
        'score',
        'warm_up',
        'start',
        'end',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'tournament_id' => 'integer',
    ];
}
