<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function users() {
        return $this->belongsToMany(User::class, 'games_users');
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }
    
    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function genres() {
        return $this->belongsToMany(Genre::class, 'games_genres');
    }
}
