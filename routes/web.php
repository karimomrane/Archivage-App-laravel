<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use TCG\Voyager\Facades\Voyager;
use App\Http\Controllers\ChartController;
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
Route::group(['middleware' => 'admin.user'], function () {
    Route::get('/users','App\Http\Controllers\UserController@index');

});


Route::group(['prefix' => ''], function () {
    Voyager::routes();
});


Route::get('stats','App\Http\Controllers\ChartController@index');