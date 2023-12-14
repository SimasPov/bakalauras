<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\post;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function renderForm() {
        if(Auth::id() == 1){
            return view('pages.create-post');
        }
        else return view('pages.restrict');
    }
    public function store() {
        if(Auth::id() == 1) {
            $this->validate(request(), [
                'category' => 'required',
                'title' => 'required',
                'body' => 'required'
            ]);
            Post::create([
                'category' => request('category'),
                'title' => request('title'),
                'body' => request('body'),
                'user_id' => auth()->id()
            ]);

            return redirect('/');
        }
        else return view('pages.restrict');
    }
    public function postEdit(Post $post) {
        if(Auth::id() == 1) {
            return view('pages.edit-post', compact('post'));
        }
        else return view('pages.restrict');
    }

    public function postUpdateStore(Request $request, Post $post) {
        if(Auth::id() == 1) {
            $this->validate(request(), [
                'category' => 'required',
                'title' => 'required',
                'body' => 'required'
            ]);
            Post::where('id', $post->id)->update($request->only(['category', 'title', 'body']));

            return redirect('/');
        }
        else return view('pages.restrict');
    }
    public function postDelete(Post $post) {

        if(Auth::id() == 1) {
            $post->delete();
            return redirect('/');
        }
        else return view('pages.restrict');
    }
    public function dashboard() {
        if(Auth::id() == 1) {
            $posts = Post::all();

            return view('pages.dashboard', compact('posts'));
        }
        else return view('pages.restrict');
    }

}