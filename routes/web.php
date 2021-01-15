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
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('modify/user')->group(function () {
    //get
    Route::get('/', 'Auth\UserController@modifyUser')->name('modify.user');
    Route::get('/pwd', 'Auth\UserController@modifyUserPwd')->name('modify.user.pwd');

    //post
    Route::post('/', 'Auth\UserController@modifyUserData')->name('modify.user.data');
    Route::post('/pwd', 'Auth\UserController@modifyUserPwdData')->name('modify.user.pwd.data');

});

Route::prefix('delete')->group(function () {
    //get
    Route::get('/user', 'Auth\UserController@deleteUser')->name('delete.user');
    //post
    Route::post('/user', 'Auth\UserController@deleteUserData')->name('delete.user.data');
});

Route::resource('product' , 'ProductController');

