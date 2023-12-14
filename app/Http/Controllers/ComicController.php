<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use App\Comic;
use Illuminate\Support\Facades\Gate;

class ComicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function renderForm() {
        if(Auth::id() == 1) {
            return view('pages.create-comic');
        }
        else return view('pages.restrict');
    }
    public function store(Request $request) {
        if(Auth::id() == 1) {
            $requestData = $request->all();
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $requestData["image"] = '/storage/'.$path;
            Comic::create($requestData);

            return redirect('/');
        }
        else return view('pages.restrict');
    }
    public function comicEdit(Comic $comic) {
        if(Auth::id() == 1) {
            return view('pages.edit-comic', compact('comic'));
        }
        else return view('pages.restrict');
    }

    public function comicUpdateStore(Request $request, comic $comic) {
        if(Auth::id() == 1) {
            $requestData = $request->all();
            $fileName = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('images', $fileName, 'public');
            $requestData["image"] = '/storage/'.$path;
            Comic::where('id', $comic->id)->update($request->only(['isbn', 'title', 'description', 'author', 'pages', 'year', 'price', 'genre', 'publisher']));
            Comic::where('id', $comic->id)->update(array('image'=>$requestData["image"]));

            return redirect('/');
        }
        else return view('pages.restrict');
    }
    public function comicDelete(Comic $comic) {
        if(Auth::id() == 1) {
            $comic->delete();
            return redirect('/');
        }
        else return view('pages.restrict');
    }
    public function dashboard()
    {
        if (Auth::id() == 1) {
            $comics = Comic::all();

            return view('pages.dashboard-comics', compact('comics'));
        }
        else return view('pages.restrict');

    }
}