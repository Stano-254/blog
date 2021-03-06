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

Route::get('/admin','AdminController@login');
Route::match(['get','post'],'/admin','AdminController@login');

Route::get('customers','CustomersController@index')->name('customers.index');
Route::get('customers/create','CustomersController@create')->name('customers.create');
Route::post('customers','CustomersController@store')->name('customers.store');
Route::get('customers/{customer}','CustomersController@show')->name('customers.show')->middleware('can:view,customer');
Route::get('customers/{customer}/edit','CustomersController@edit')->name('customers.edit');
Route::patch('customers/{customer}','CustomersController@update')->name('customers.update');
Route::delete('customers/{customer}','CustomersController@destroy')->name('customers.destroy');
//Route::resource('customers','CustomersController');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
