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

Route::get('/', ['as' => 'index', 'uses' => 'HomeController@index']);
Route::prefix('profile')->group(function() {
    Route::get('/{user?}', ['as' => 'profile', 'uses' => 'UserController@index'])->where('user', '[0-9]+');
    Route::get('/{user}/topics', ['as' => 'profile.topics', 'uses' => 'UserController@showActivity'])->where('user', '[0-9]+');
    Route::get('/{user}/posts', ['as' => 'profile.posts', 'uses' => 'UserController@showActivity'])->where('user', '[0-9]+');
});
Route::get('/topic/{topic}', ['as' => 'topic', 'uses' => 'TopicController@index'])->where('topic', '[0-9]+');
Route::get('/faq', function() {
    return view('faq');
})->name('faq');
Route::get('/search', ['as' => 'search', 'uses' => 'HomeController@search']);

Route::group(['middleware' => ['auth']], function() {
    Route::prefix('profile')->group(function() {
        Route::get('/edit', ['as' => 'profile.edit', 'uses' => 'UserController@edit']);
        Route::patch('/edit', 'UserController@update');
        Route::post('/picture', ['as' => 'profile.picture', 'uses' => 'UserController@uploadProfilePicture']);
        Route::get('/picture/delete', ['as' => 'profile.picture.delete', 'uses' => 'UserController@deleteProfilePicture']);
        Route::get('/password/edit', ['as' => 'profile.password.edit', 'uses' => 'UserController@editPassword']);
        Route::patch('/password/edit', 'UserController@updatePassword');
    });

    Route::prefix('topic')->group(function() {
        Route::get('/create', ['as' => 'topic.create', 'uses' => 'TopicController@create']);
        Route::post('/create', 'TopicController@save');
    });

    Route::prefix('post')->group(function() {
        Route::post('/create', ['as' => 'post.create', 'uses' => 'PostController@save']);
    });
});