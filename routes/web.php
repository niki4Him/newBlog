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



Route::get('/', ['uses' => 'PostController@index', 'as' => 'posts.index']);

Route::get('/about', function() {
	return view('about');
});

Route::get('/contact', function() {
	return view('contact');
});

Route::post('contact', 'PagesController@postContact');

Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController');

Route::get('/posts/category/{category}', 'CategoryController@getCategory');

Route::get('/posts/tags/{tag}', 'TagController@getTags');

Route::resource('tags', 'TagController');

Route::post('/posts/{post}', 'CommentController@store');
Route::get('/comment/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comment.edit']);
Route::put('/comment/{id}', ['uses' => 'CommentController@update', 'as' => 'comment.update']);
Route::delete('/comment/{id}', ['uses' => 'CommentController@destroy', 'as' => 'comment.destroy']);



Auth::routes();






