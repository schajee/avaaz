<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/help/{page?}', 'HelpController@router');

Route::get('/topics', 'TopicController@index');
Route::get('/topics/{slug}', 'TopicController@show');

Route::get('/polls', 'PollController@index');
Route::get('/polls/{slug}', 'PollController@show')->where('slug', '[^0-9]+');
