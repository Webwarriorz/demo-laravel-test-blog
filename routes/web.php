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

/**
 * Auth routes
 */
Auth::routes();

/**
 * Admin routes
 */
Route::group(['middleware' => ['auth', 'admin']], function () {

    // Posts
    Route::get('/posts/{id}/edit','PostsController@edit');
    Route::post('/posts/{id}/edit','PostsController@update');
    Route::get('/posts/{id}/delete','PostsController@destroy');
    Route::get('/posts/create','PostsController@create');
    Route::post('/posts','PostsController@store');
    Route::get('/posts/{id}/tags','PostsController@getConnectedTags');

    // Comments
    Route::get('/comments/{id}/delete','CommentsController@destroy');

    // Tags
    Route::get('/tags/{id}/edit','TagsController@edit');
    Route::get('/tags/{id}/delete','TagsController@destroy');
    Route::post('/tags/{id}/edit','TagsController@update');
    Route::get('/tags/create','TagsController@create');
    Route::post('/tags','TagsController@store');
    Route::get('/tags/get-all-tags','TagsController@getAllTags');
});

/**
 * Posts routes
 */
Route::get('/posts/tags/{tag}','TagsController@showPostsByTag');
Route::get('/posts','PostsController@index')->name('home');
Route::get('/','PostsController@index');
Route::get('/posts/{post}','PostsController@show');

/**
 * Comments routes
 */
Route::post('/posts/{post}/comments','CommentsController@store');

/**
 * Tags routes
 */
Route::get('/tags','TagsController@index');