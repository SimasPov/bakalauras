<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    protected $fillable = ['isbn', 'title', 'description', 'author', 'page', 'year', 'price', 'image', 'genre', 'publisher',];


    public function user() {

        return $this->belongsTo(User::class);
    }

    public function reviews() {

        return $this->hasMany(Review::class);
    }
}
