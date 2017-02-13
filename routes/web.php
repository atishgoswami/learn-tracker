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
    return view('welcome');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/notes', 'NotesController@index')->name('notes');
Route::get('/note/create', 'NotesController@create')->name('note.create');
Route::post('/note/save', 'NotesController@save')->name('note.save');
Route::patch('/note/{note_id}/update', 'NotesController@update')->name('note.update');
Route::get('/note/{note_id}/edit', 'NotesController@edit')->name('note.edit');
Route::delete('/note/{note_id}/delete', 'NotesController@delete')->name('note.delete');