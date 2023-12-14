<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\ForumPosts;
use Illuminate\Support\Facades\Gate;

class ForumController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function renderForm() {
        return view('pages.create-forum-post');

    }

    public function showPosts() {
        $posts = ForumPosts::all();
        $cats = DB::table('forum_posts')->select('category')->distinct()->get();
        return view('pages.forum', compact('posts', 'cats'));
    }
    public function showPost(ForumPosts $post) {

        return view('pages.forum-full-post', compact('post'));
    }
    public function store() {
        if(Auth::check()) {
            $this->validate(request(), [
                'category' => 'required',
                'title' => 'required',
                'body' => 'required'
            ]);
            ForumPosts::create([
                'category' => request('category'),
                'title' => request('title'),
                'body' => request('body'),
                'user_id' => auth()->id()
            ]);

            return redirect('/forum');
        }
        else return view('pages.restrict');
    }

    public function postDelete(ForumPosts $post) {

        if(Auth::check()) {
            $post->delete();
            return redirect('/');
        }
        else return view('pages.restrict');
    }

    public function showCat($category) {

        $cats = ForumPosts::where('category', '=', $category)->get();
        $posts = DB::table('forum_posts')->select('category')->distinct()->get();
        return view('pages.cat', compact('cats', 'posts'));
    }
}