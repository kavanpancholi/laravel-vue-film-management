<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Film extends Model
{
    use Sluggable;

    protected $hidden = array('pivot');

    protected $fillable = [
        'name', 'slug', 'description', 'release_date', 'rating', 'ticket_price', 'country_id', 'photo'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getPhotoAttribute($value)
    {
        if ($value && file_exists( public_path() . '/uploads/' . $value)) {
            return URL::to('/'). '/uploads/' . $value;
        } else {
            return URL::to('/'). '/images/no-image.jpg';
        }
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'film_genre');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
