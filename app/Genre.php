<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public function games() {
        return $this->belongsToMany(Game::class, 'games_genres');
    }
}
