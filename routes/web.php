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

Route::get('/', 'HomeController@index');
Route::post('/reserve', 'HomeController@reserve')->name('home.reserve');
Route::post('/contact', 'HomeController@contact')->name('home.contact');

Auth::routes(['register' => false]);


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth', 'namespace' => 'Admin'], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::resource('slider', 'SliderController');
    Route::resource('category', 'CategoryController');
    Route::resource('item', 'ItemController');
    Route::get('reserv', 'ReservController@index')->name('reserv.index');
    Route::get('reserv/{reserv}', 'ReservController@confirm_reserv')->name('reserv.confirm');
    Route::get('reserv/{reserv}', 'ReservController@delete')->name('reserv.delete');
    Route::get('contact', 'ContactController@index')->name('contact.index');
    Route::get('contact/us/{contact}', 'ContactController@seen')->name('contact.status');
    Route::get('contact/{contact}', 'ContactController@delete')->name('contact.delete');
    Route::resource('section', 'SectionController');
    Route::resource('dish', 'DishController');
    Route::resource('page_details', 'ContactDetailsController');
});