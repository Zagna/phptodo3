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

Route::get('/roles', 'RoleController@index')->name('roles');
Route::patch('/roles/promote/{user}', 'RoleController@promote');
Route::patch('/roles/demote/{user}', 'RoleController@demote');

Route::get('/sections/{section}', 'SectionController@edit');
Route::get('/sections', 'SectionController@index')->name('sections');
Route::post('/sections', 'SectionController@store');
Route::patch('/sections/{section}', 'SectionController@update');
Route::delete('/sections/{section}', 'SectionController@destroy');

Route::get('/{todo}', 'TodoController@edit');
Route::get('/', 'TodoController@index')->name('todo');
Route::post('/', 'TodoController@store');
Route::patch('/{todo}', 'TodoController@update');
Route::delete('/{todo}', 'TodoController@destroy');
