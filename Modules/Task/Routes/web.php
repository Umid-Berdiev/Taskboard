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

Route::prefix('taskboard')->group(function() {
    Route::get('/', 'TaskboardController@index');
	Route::post('all', 'TaskboardController@loadAll')
		->name('taskboard.all');
	Route::post('add', 'TaskboardController@create')
		->name('taskboard.add');
	Route::post('update/{id}', 'TaskboardController@update')
		->name('taskboard.update');
	Route::post('delete/{id}', 'TaskboardController@destroy')
		->name('taskboard.delete');
});

Route::prefix('task')->group(function() {
    Route::get('/', 'TaskController@index');
	Route::post('all', 'TaskController@loadAll')
		->name('task.all');
	Route::post('add', 'TaskController@create')
		->name('task.add');
	Route::post('update/{id}', 'TaskController@update')
		->name('taskboard.delete');
	Route::post('delete/{id}', 'TaskController@destroy')
		->name('task.delete');
});
