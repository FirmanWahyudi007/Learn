<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('users', 'UserController@users');
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::get('posts', 'PostController@index');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('users/profile', 'UserController@profile');
    Route::get('users/{id}', 'UserController@profileById');
    Route::put('edit/{user}', 'UserController@update');
	Route::post('post', 'PostController@add');
	Route::put('post/{post}', 'PostController@update');
	Route::delete('post/{post}', 'PostController@delete');
});