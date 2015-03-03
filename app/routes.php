<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::model('user','User');
Route::model('post','Post');

Route::get('/', 'UsersController@home');

Route::get('/login', 'UsersController@login');
Route::post('/login', 'UsersController@doLogin');
Route::get('/logout', 'UsersController@logout');

Route::get('/register', 'UsersController@register');
Route::post('/register', 'UsersController@saveRegistration');

Route::get('/create', 'PostsController@create');
Route::post('/create', 'PostsController@saveCreate');

Route::get('/edit/{id}', 'PostsController@edit');
Route::post('edit', 'PostsController@saveEdit');

Route::get('/delete/{id}','PostsController@delete');

Route::get('/view/{id}', 'PostsController@view')->where('id', '\d+');

Route::post('/comment', 'CommentsController@saveComment');

Route::get('/voteUp/{id}', 'VotesController@voteUp');
Route::get('/voteDown/{id}', 'VotesController@voteDown');

Route::get('/about', function()
{
    session_start();
   return View::make('about');
});

Route::get('/contact', function()
{
    session_start();
    return View::make('contact');
});