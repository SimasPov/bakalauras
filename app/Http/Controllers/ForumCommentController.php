<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ForumComment;
use App\ForumPosts;
use Illuminate\Support\Facades\Auth;

class ForumCommentController extends Controller
{
    public function addComment(ForumPosts $post) {
        if(Auth::check())
            ForumComment::create([
                'user_id' => auth()->id(),
                'forum_posts_id' => $post->id,
                'body' => request('body')
            ]);
        else return view('pages.restrict');

        return back();
    }
}