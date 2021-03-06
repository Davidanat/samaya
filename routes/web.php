<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', 'HomeController@index')->name('home');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index')
        ->name('dashboard');

    Route::get('admin', 'DashboardController@index')->name('admin-dashboard');
    Route::resource('user', 'Admin\UserController');
    Route::resource('client', 'ClientController');
});

Auth::routes();