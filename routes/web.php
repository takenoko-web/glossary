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

Route::get('/', 'WordController@index')->name('words.index');
Route::resource('/words', 'WordController')->except(['index']);
/*Route::prefix('words')->name('words.')->group(function () {
    Route::get('/search', 'WordController@search')->name('search');
    Route::get('/autocomplete', 'WordController@autocomplete')->name('autocomplete');
});*/
Route::get('/words', 'WordController@search')->name('words.search');
Route::get('/words/autocomplete', 'WordController@index')->name('words.autocomplete');
Route::get('/tags/{name}', 'TagController@show')->name('tags.show');
