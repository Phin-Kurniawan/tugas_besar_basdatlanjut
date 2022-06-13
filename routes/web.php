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

Route::get('/', function() {
    return redirect(route('login'));
});

Auth::routes(['verify' => false, 'reset' => false]);

Route::middleware('auth')->group(function() {
    Route::get('/home', 'DashboardController@index')->name('home');
    Route::get('/find_vets', 'FindVetsController@index')->name('find_vets');
    Route::get('/event', 'EventController@index')->name('event');
    Route::get('/articles', 'ArticlesController@index')->name('articles');
    Route::post('/articles', 'ArticlesController@add')->name('addArticle');
    Route::get('/articles/delete/{article}', 'ArticlesController@delete')->name('delArticle');
});
