<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['user_id', 'comic_id', 'body'];

    public function reviews() {

        return $this->belongsTo(Comic::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
