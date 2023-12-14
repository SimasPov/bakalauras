<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    protected $fillable = ['user_id', 'forum_posts_id', 'body'];

    public function comments() {

        return $this->belongsTo(ForumPosts::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
}
