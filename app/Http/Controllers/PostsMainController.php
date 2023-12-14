<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Post;

class PostsMainController extends Controller
{
    public function index() {
        $posts = Post::paginate(10);

        return view('pages.news', compact('posts'));
    }
    public function showPost(Post $post) {

        return view('pages.full-post', compact('post'));
    }

    public function showSearch(Request $request) {

        $search = $request->searchNews;
        $posts = Post::where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('category', 'LIKE', '%'.$search.'%')
            ->get();
        echo $search;


        return view('pages.search-news', compact('posts'));

    }
}