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

//Authentication routes
Auth::routes(['verify' => true]);

//Welcome and Home routes
Route::get('/', 'WelcomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

//Resource related routes
Route::get('/display_users','UserController@display')->name('display_users');

Route::resource('/lost_items','LostItemController');

Route::resource('/item_requests','ItemRequestController');
Route::get('/create/{id}','ItemRequestController@create');

//Mail routes
Route::get('/send_mail_approve/{id}','ItemRequestController@requestApprove');
Route::get('/send_mail_disapprove/{id}','ItemRequestController@requestDisapprove');
