<?php

use Illuminate\Support\Facades\Route;

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

 
//  auth  

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::get('/register', 'Auth\RegisterController@index')->name('register');

// account

Route::get('addaccount', 'AcountController@index');

// customer
Route::get('addcustomer', 'CustomerController@index')->name('addcustomer');

// laysout
Route::get('app', 'LayoutController@app')->name('app');
Route::get('sidebar', 'LayoutController@sidebar')->name('sidebar');
Route::get('navbar', 'LayoutController@navbar')->name('navbar');

