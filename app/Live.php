<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Live extends Model
{
    //use Searchable;

    // protected fillable = [
    //     ''
    // ];
    
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
