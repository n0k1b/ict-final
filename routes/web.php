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
    //Homepage Content Start
    Route::get('homepage_content','AdminController@show_homepage_content')->name('homepage_content');
    Route::get('add_homepage_content','AdminController@add_homepage_content_interface')->name('add_homepage_content_interface');
    Route::post('add_homepage_content','AdminController@add_homepage_content')->name('add_homepage_content');
    Route::get('edit_homepage_content/{id}','AdminController@edit_homepage_content_interface')->name('edit_homepage_content_interface');
    Route::get('edit_homepage_image/{id}','AdminController@edit_homepage_image_interface')->name('edit_homepage_image_interface');
    Route::get('home_page_content_active_status_update/{id}','AdminController@home_page_content_active_status_update')->name('home_page_content_active_status_update');
    Route::get('home_page_content_delete/{id}','AdminController@home_page_content_delete')->name('home_page_content_delete');
    Route::post('edit_homepage_content','AdminController@edit_homepage_content')->name('edit_homepage_content');
    Route::post('edit_homepage_image','AdminController@edit_homepage_image')->name('edit_homepage_image');
    //Homepage Content End

    //chapter start

    Route::get('chapter_content','AdminController@show_chapter_content')->name('chapter_content');
    Route::get('add_chapter_content','AdminController@add_chapter_content_interface')->name('add_chapter_content_interface');
    Route::post('add_chapter_content','AdminController@add_chapter_content')->name('add_chapter_content');
    Route::get('edit_chapter_content/{id}','AdminController@edit_chapter_content_interface')->name('edit_chapter_content_interface');
    Route::get('edit_chapter_image/{id}','AdminController@edit_chapter_image_interface')->name('edit_chapter_image_interface');
    Route::get('chapter_content_active_status_update/{id}','AdminController@chapter_content_active_status_update')->name('chapter_content_active_status_update');
    Route::get('chapter_content_delete/{id}','AdminController@chapter_content_delete')->name('chapter_content_delete');
    Route::post('edit_chapter_content','AdminController@edit_chapter_content')->name('edit_chapter_content');
    Route::post('edit_chapter_image','AdminController@edit_chapter_image')->name('edit_chapter_image');


    //chapter end


});


Route::get('/', function () {
    return view('welcome');
});
