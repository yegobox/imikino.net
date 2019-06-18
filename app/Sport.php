<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $table = 'sports';
    
        public function posts()
        {
            return $this->hasMany('App\Post');
        }

        public function lives()
        {
            return $this->hasMany('App\Live');
        }
}
