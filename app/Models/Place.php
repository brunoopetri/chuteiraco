<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'address',
        'capacity',
        'other_relevant_details',
        'game_id',
    ];

    /**
     * Get the game that the place is associated with.
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
