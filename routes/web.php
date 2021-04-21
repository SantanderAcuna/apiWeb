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
/*
Route::get('/', function () {
    return view('photos');
});*/

Route::get('/', 'PhotosController@index');
Route::post('photos/add','PhotosController@create')->name('post');
Route::get('photos/del/{id}', 'PhotosController@destroy');
Route::get('photos/{id}', 'PhotosController@store');
Route::post('photos/patch','PhotosController@patch')->name('patch');

