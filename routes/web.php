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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**
 * Маршруты для раздела с вопросами
 */
Route::get('/questions', 'QuestionController@index');
Route::post('/question', 'QuestionController@store');
Route::delete('/question/{question}', 'QuestionController@destroy');


Route::get('/topics', 'TopicController@index');
Route::post('/topic', 'TopicController@store');
Route::delete('/topic/{topic}', 'TopicController@destroy');