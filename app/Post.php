<?php

namespace App;


use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Searchable;
    
    public function Location()
    {
        return $this->belongsTo('App\Location');
    }

    public function Sport()
    {
        return $this->belongsTo('App\Sport');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
