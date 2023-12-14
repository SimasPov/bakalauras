<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();



Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PublicController@index');

Route::get('/new-comic', 'ComicController@renderForm');

Route::post('/new-comic/publish', 'ComicController@store');

Route::get('/comic/{comic}', 'PublicController@showComic');

Route::post('/comic/{comic}/review', 'ReviewController@addReview');

Route::get('/news', 'PostsMainController@index');

Route::get('/new-post', 'PostController@renderForm');

Route::post('/publish', 'PostController@store');

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/post/{post}', 'PostsMainController@showPost');

Route::post('/post/{post}/comment', 'CommentController@addComment');

Route::get('/admin', 'PostController@dashboard');

Route::get('/admin-comics', 'ComicController@dashboard');

Route::get('/shopping-cart', 'ShoppingCartController@getCart');

Route::get('/add-to-cart/{id}', 'ShoppingCartController@getAddTocart');

Route::get('/reduce/{id}', 'ShoppingCartController@getReduceByOne');

Route::get('/remove/{id}','ShoppingCartController@getRemoveItem');

Route::get('/search/', 'PublicController@showSearch')->name('search');

Route::get('/about', 'PublicController@showAbout');

Route::get('/forum', 'ForumController@showPosts');

Route::get('/new-forum-post', 'ForumController@renderForm');

Route::post('/new-forum-post/publish', 'ForumController@store');

Route::get('/forum/{cats}', 'ForumController@showCat');

Route::get('/forum/post/{post}/', 'ForumController@showPost');

Route::post('/forum/post/{post}/comment', 'ForumCommentController@addComment');

Route::get('/forum/post/{post}/delete', 'ForumController@postDelete');

Route::get('/search-news/', 'PostsMainController@showSearch')->name('searchNews');


Route::get('/post/{post}/edit', 'PostController@postEdit');

Route::patch('/post/{post}/update', 'PostController@postUpdateStore');

Route::get('/post/{post}/delete', 'PostController@postDelete');


Route::get('/comic/{comic}/edit', 'ComicController@comicEdit');

Route::patch('/comic/{comic}/update', 'ComicController@comicUpdateStore');

Route::get('/comic/{comic}/delete', 'ComicController@comicDelete');


