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

Auth::routes(['verify' => true]);

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index')->name('home');

Route::get('display_users','UserController@display')->name('display_users');

Route::resource('lost_items','LostItemController');

Route::resource('item_requests','ItemRequestController');
Route::get('create/{id}','ItemRequestController@create');
