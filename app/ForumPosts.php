<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPosts extends Model
{
    protected $fillable = ['category', 'title', 'body', 'user_id'];

    public function forumComments() {

        return $this->hasMany(ForumComment::class);
    }
    public function user() {

        return $this->belongsTo(User::class);
    }
}
