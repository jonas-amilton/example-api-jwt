<?php

namespace App\Models;

use Illuminate\Console\Attributes\Hidden;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['name', 'release_date', 'genre', 'publisher', 'is_multiplayer', 'is_favorite', 'description', 'user_id'])]
#[Hidden(['user_id', 'created_at', 'updated_at'])]
class Game extends Model
{
    protected $table = 'games';

    public static function booted()
    {
        static::creating(function ($game) {
            if (auth('api')->check()) {
                $game->user_id = auth('api')->id();
            }
        });
    }

    /**
     * Get the user that owns the game.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
