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



Route::get('/', 'PostController@index')->name('posts.index');

Route::get('/about', function() {
	return view('about');
});

Route::get('/contact', function() {
	return view('contact');
});

Route::post('contact', 'PagesController@postContact');

Route::get('/email', 'PagesController@mail');
Route::post('/email', 'PagesController@email')->name('sendMail');

// Post Routes//
Route::get('/', 'PostController@index')->name('list_posts');
Route::group(['prefix' => 'posts'], function () {
    Route::get('/drafts', 'PostController@drafts')
        ->name('list_drafts')
        ->middleware('auth');
      Route::get('/publish/{post}', 'PostController@publish')
        ->name('publish_post')
        ->middleware('can:publish-post');
    Route::get('/create', 'PostController@create')
        ->name('create_post')
        ->middleware('can:create-post');
    Route::post('/posts', 'PostController@store')
        ->name('store_post')
        ->middleware('can:create-post');
    Route::get('/posts/{post}/edit', 'PostController@edit')
        ->name('edit_post')
        ->middleware('can:update-post,post');
    Route::post('posts/{post} ', 'PostController@update')
        ->name('update_post')
        ->middleware('can:update-post,post');
});



Route::resource('posts', 'PostController');

Route::resource('categories', 'CategoryController');

Route::get('/posts/category/{category}', 'CategoryController@getCategory');

Route::get('/posts/tags/{tag}', 'TagController@getTags');

Route::resource('tags', 'TagController');

Route::post('/posts/{post}', 'CommentController@store');
Route::get('/comment/{id}/edit', 'CommentController@edit')->name('comment.edit');
Route::put('/comment/{id}', 'CommentController@update')->name('comment.update');
Route::delete('/comment/{id}', 'CommentController@destroy')->name('comment.destroy');


Route::prefix('admin')->group(function() {
    Route::get('/login/form', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login/form', 'Auth\AdminLoginController@login')->name('admin.login.submit');
});

Route::post('comment/like','LikeController@toggleLike')->name('toggleLike');

Auth::routes();






