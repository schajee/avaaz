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

Route::get(     '/',        'HomeController@index');
Route::get(     'info',     'HomeController@info');
Route::get(     'search',   'SearchController@index');

Route::get(     'register',                 'AuthController@create');
Route::post(    'register',                 'AuthController@store');
Route::get(     'login',                    'AuthController@edit');
Route::post(    'login',                    'AuthController@update');
Route::get(     'login/{provider}',         'AuthController@login');
Route::get(     'socialize/{provider}',     'AuthController@socialize');
Route::get(     'logout',                   'AuthController@logout');


Route::get('help/{page?}', 'HelpController@router');

Route::get('topics', 'TopicController@index');
Route::get('topics/{slug}', 'TopicController@show');

Route::get(     'polls',                    'PollController@index');
Route::get(     'polls/{slug}',             'PollController@show')->where('slug', '[^0-9]+');
Route::post(    'polls/{slug}',             'PollController@update')->where('slug', '[^0-9]+');


Route::get(		'responses/{id}/delete',	'ResponseController@delete')->where('id', '[0-9]+');
Route::delete(	'responses/{id}/destroy',	'ResponseController@destroy')->where('id', '[0-9]+');


Route::get(     'categories',              'CategoryController@index');
Route::get(     'categories{id}',          'CategoryController@show')->where('id', '[0-9]+');
Route::get(     'categories/create',       'CategoryController@create');
Route::post(    'categories/store',        'CategoryController@store');
Route::get(     'categories/{id}/edit',    'CategoryController@edit')->where('id', '[0-9]+');
Route::put(     'categories/{id}/update',  'CategoryController@update')->where('id', '[0-9]+');
Route::get(     'categories/{id}/delete',  'CategoryController@delete')->where('id', '[0-9]+');
Route::delete(  'categories/{id}/destroy', 'CategoryController@destroy')->where('id', '[0-9]+');


Route::get(     'data/search.json', 'DataController@index');