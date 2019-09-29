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
    return view('index');
})->name('/');

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/opentab/{id}', 'TabController@openTab')->name('opentab');
Route::post('/closetab/{id}', 'TabController@closeTab')->name('closetab');
