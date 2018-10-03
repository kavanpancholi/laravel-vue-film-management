<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function film()
    {
        $this->belongsTo(Film::class);
    }

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
