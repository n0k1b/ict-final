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


Route::get('admin','AdminController@index');

Route::group(['prefix' => 'admin'], function()
{
    Route::get('main_page_content','AdminController@show_main_page_content')->name('main_page_content');

});


Route::get('/', function () {
    return view('welcome');
});
