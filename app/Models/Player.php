<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'patronymic',
        'surname',
        'gender',
        'img_url',
        'city',
        'region',
        'birth',
        'level',
        'start_playing_year',
        'start_tournament_year',
        'start_tournament_month',
        'racket_firm',
        'racket_model',
        'best_position_single',
        'best_position_single_date',
        'best_position_pair',
        'best_position_pair_date',
        'partner_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        //'birth' => 'date',
        //'best_position_single_date' => 'date',
        //'best_position_pair_date' => 'date',
    ];
}
