<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('users', 'UserController@Users');
Route::post('register', 'AuthController@Register');
Route::post('login', 'AuthController@Login');
Route::get('users/profile', 'UserController@Profile')->middleware('auth:api');