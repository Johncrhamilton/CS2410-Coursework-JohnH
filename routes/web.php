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

Route::get('/', function ()
{
  return view('welcome');
});


Auth::routes(['verify' => true]);

Route::get('home', 'HomeController@index')->name('home');
Route::get('display_user','UserController@display')->name('display_user');

Route::resource('lost_items','LostItemController');
Route::resource('item_requests','ItemRequestController');
