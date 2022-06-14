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
    Route::post('/event', 'EventController@add')->name('addEvent');
    Route::get('/event/details/{event}', 'EventController@detail')->name('eventDetails');
    Route::get('/event/delete/{event}', 'EventController@delete')->name('eventDelete');
    Route::get('/event/update/{event}', 'EventController@edit')->name('editEvent');
    Route::post('/event/update/{event}', 'EventController@update')->name('eventUpdate');
    Route::get('/articles', 'ArticlesController@index')->name('articles');
    Route::post('/articles', 'ArticlesController@add')->name('addArticle');
    Route::get('/articles/delete/{article}', 'ArticlesController@delete')->name('delArticle');
    Route::get('/articles/edit/{article}', 'ArticlesController@edit')->name('editArticle');
    Route::post('/articles/edit/{article}', 'ArticlesController@update')->name('editArticle');
    Route::get('/articles/details/{article}', 'ArticlesController@details')->name('articleDetails');
    Route::get('/appointment', 'AppointmentController@index')->name('appointment');
    Route::post('/appointment', 'AppointmentController@add')->name('addAppointment');
    Route::get('/appointment/delete/{appointment}', 'AppointmentController@delete')->name('delAppointment');
    Route::get('/appointment/update/{appointment}', 'AppointmentController@edit')->name('editAppointment');
    Route::post('/appointment/update/{appointment}', 'AppointmentController@update')->name('updAppointment');
    Route::get('/medhistory', 'MedicalHistoryController@index')->name('medicalHistory');
    Route::post('/medhistory', 'MedicalHistoryController@filter')->name('filterMedHstr');
});
