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
    return view('student.display');
});

Route::resource('student', 'studentresourceController');
Route::get('student/login','studentresourceController@login');
Route::post('student/dologin','studentresourceController@dologin');
Route::get('student/logout','studentresourceController@logOut');
