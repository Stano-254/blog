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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::view('/','home');
Route::get('contacts','ContactFormController@create')->name('contacts.create');
Route::post('contacts','ContactFormController@store')->name('contacts.store');
Route::view('about','about')->name('about');
Route::resource('customers','CustomersController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
