<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index() {
        $comics = Comic::paginate(10);

        return view('pages.home', compact('comics'));
    }
    public function showComic(Comic $comic) {

        return view('pages.full-comic', compact('comic'));
    }
    public function showSearch(Request $request) {

        $search = $request->input('search');
        $comics = Comic::where('title', 'LIKE', '%'.$search.'%')
            ->orWhere('author', 'LIKE', '%'.$search.'%')
            ->orWhere('genre', 'LIKE', '%'.$search.'%')
            ->orWhere('isbn', '=', $search)
            ->get();

        return view('pages.search', compact('comics'));
    }
    public function showAbout() {

        return view('pages.about');
    }
}