<?php

use App\Http\Controllers\Backend\ArtikelController;
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
Auth::routes();

Route::group(['namespace' => 'Backend', 'middleware' => 'auth'] ,function(){
  Route::resource('admin', DashboardController::class);
  Route::resource('video', VideoController::class);
  Route::resource('yayasan', YayasanController::class);
  Route::resource('donasi', DonasiController::class);
  Route::resource('artikel', 'ArtikelController');
  
  Route::put('donasi/nonactive/{donasi}','DonasiController@nonactive')->name('donasi.nonactive');
  Route::put('donasi/active/{donasi}','DonasiController@active')->name('donasi.active');
});
// Route::group(['namespace' => 'Frontend'] ,function(){
//   Route::get('/','UserController@index')->name('home');
// });


Route::get('/user', [App\Http\Controllers\HomeController::class, 'index'])->name('user');
Route::get('/coba', function () {
  return view('welcome');
});
Route::get('/{any}', function () {
  return view('app');
})->where('any', '.*'); 