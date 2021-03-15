<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('users', 'UserController@users');
Route::post('register', 'AuthController@register');
Route::post('login', 'AuthController@login');
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('users/profile', 'UserController@profile');
    Route::get('users/{id}', 'UserController@profileById');
	Route::post('post', 'PostController@add');
	Route::put('post/{post}', 'PostController@update');
});