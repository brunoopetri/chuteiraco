<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'status',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Get the places associated with the game.
     */
    public function places()
    {
        return $this->hasMany(Place::class);
    }

    /**
     * The teams that belong to the game.
     */
    public function teams()
    {
        return $this->belongsToMany(Team::class);
    }

    /**
     * The teams that belong to the group.
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
}
