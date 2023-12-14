<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Comic;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function addReview(Comic $comic) {
        if(Auth::check())
            Review::create([
                'user_id' => auth()->id(),
                'comic_id' => $comic->id,
                'body' => request('body')
            ]);
        else return view('pages.restrict');

        return back();
    }
}