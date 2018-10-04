<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $hidden = array('pivot');

    public function films()
    {
        return $this->belongsToMany(Film::class, 'film_genre');
    }
}
