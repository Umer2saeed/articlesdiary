<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'slug', 'photo_id'
    ];

    public function posts() {
        return $this->hasMany('App\Post');
    }

    public function photo() {
        return $this->belongsTo('App\Photo');
    }
}
