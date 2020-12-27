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

    //topic start

    Route::get('topic_content','AdminController@show_topic_content')->name('topic_content');
    Route::get('add_topic_content','AdminController@add_topic_content_interface')->name('add_topic_content_interface');
    Route::post('add_topic_content','AdminController@add_topic_content')->name('add_topic_content');
    Route::get('edit_topic_content/{id}','AdminController@edit_topic_content_interface')->name('edit_topic_content_interface');
    Route::get('edit_topic_image/{id}','AdminController@edit_topic_image_interface')->name('edit_topic_image_interface');
    Route::get('topic_content_active_status_update/{id}','AdminController@topic_content_active_status_update')->name('topic_content_active_status_update');
    Route::get('topic_content_delete/{id}','AdminController@topic_content_delete')->name('topic_content_delete');
    Route::post('edit_topic_content','AdminController@edit_topic_content')->name('edit_topic_content');
    Route::post('edit_topic_image','AdminController@edit_topic_image')->name('edit_topic_image');
    Route::post('save_order_priority','AdminController@save_order_priority')->name('save_order_priority');

    //topic end

    //content start

    Route::get('content_home','AdminController@content_home')->name('content_home');
    Route::get('get_chapter','AdminController@get_chapter')->name('get_chapter');
    Route::post('get_topic','AdminController@get_topic')->name('get_topic');
    Route::view('content_main','admin.content_main');
    Route::post('show_content','AdminController@show_content')->name('show_content');
    Route::post('get_content','AdminController@get_content')->name('get_content');
    Route::post('add_content_text','AdminController@add_content_text')->name('add_content_text');
    Route::post('add_content_image','AdminController@add_content_image')->name('add_content_image');
    Route::post('add_content_header','AdminController@add_content_header')->name('add_content_header');
    Route::post('delete_content','AdminController@delete_content')->name('delete_content');

    


});


Route::get('/', function () {
    return view('welcome');
});
