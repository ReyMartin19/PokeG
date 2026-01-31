<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;

    // This tells Laravel: "It is safe to save data into these columns"
    protected $fillable = [
        'pokeapi_id',
        'name',
        'sprite_url',
        'hp',
        'attack',
        'defense',
        'speed',
        'type_1',
        'type_2',
    ];
}