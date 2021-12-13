<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'started_at',
        'title',
        'category_id',
        'rank',
        'place',
        'is_groups',
        'group_amount',
        'status'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'started_at' => 'timestamp',
        'ended_at' => 'timestamp',
        'category_id' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function players() 
    {
        return $this->belongsToMany(Player::class);
    }

    public function groups()
    {
        return$this->hasMany(Group::class);
    }
}
