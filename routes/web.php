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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('customer')->group(function (){
    Route::get('index','CustomerController@index')->name('customer.index');
    Route::get('search','CustomerController@search')->name('customer.search');
    Route::get('create','CustomerController@create')->name('customer.create');
    Route::post('create','CustomerController@store')->name('customer.store');
    Route::get('edit/{id}','CustomerController@edit')->name('customer.edit');
    Route::post('edit/{id}','CustomerController@update')->name('customer.update');
    Route::get('delete/{id}','CustomerController@delete')->name('customer.delete');
});
