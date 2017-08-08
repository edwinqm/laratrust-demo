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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/403', 'HomeController@notFound');

Route::get('users', 'UsersController@index')->middleware('role:superadministrator');
Route::get('users/data', 'UsersController@data')->middleware('role:superadministrator');

Route::group(['middleware' => ['role:superadministrator']], function () {
    Route::resource('posts', 'PostsController');

    Route::get('roles', 'RolesController@index');
    Route::get('roles/data', 'RolesController@data');

    Route::resource('permissions', 'PermissionsController');
});