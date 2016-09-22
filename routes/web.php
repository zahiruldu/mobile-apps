<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/api/words', 'WordController@index');
Route::get('/word/all', 'WordController@allWords');
Route::get('/word/add', 'WordController@getWordForm');
Route::post('/word/add', 'WordController@addWord');
Route::get('/word/edit/{id}', 'WordController@getEdit');
Route::post('/word/edit/{id}', 'WordController@updateWord');

Route::get('/api/feedback', 'FeedbackController@feedBack');
