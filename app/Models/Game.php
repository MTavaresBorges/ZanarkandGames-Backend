<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age_recommendation',
        'price',
        'stock',
        'description',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'game_user');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_game');
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class, 'platform_game');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'cart_game');
    }
}
