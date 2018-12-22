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

Route::group(['middleware'=>['auth'],'prefix'=>'Admin'],function(){
    Route::resource('Product','ProductController');
    Route::resource('User','Admin\UserController');
    Route::resource('UserDetail','Admin\UserDetailController');
    Route::resource('Role','Admin\RoleController');
    Route::resource('Permission','Admin\PermissionController');
    Route::resource('RolePermission','Admin\RolePermissionController');

});

Route::group(['prefix'=>'Users'],function (){
    Route::resource('UserPost','User\Post');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('login/{service}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{service}/callback', 'Auth\LoginController@handleProviderCallback');

//Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
//Route::get('login/twitter', 'Auth\LoginController@redirectToProviderTwitter');
//Route::get('login/google', 'Auth\LoginController@redirectToProviderGoogle');
//Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
//Route::get('login/twitter/callback', 'Auth\LoginController@handleProviderCallbackTwitter');
//Route::get('login/google/callback', 'Auth\LoginController@handleProviderCallbackGoogle');
