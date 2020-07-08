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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');

Route::middleware('is_admin')->group(function(){
    Route::get('admin/home', 'Admin\AdminCategoryController@adminHome')->name('admin.home');
    Route::resource('admin/category', 'Admin\AdminCategoryController');
    Route::get('admin/category/edit/{id}', 'Admin\AdminCategoryController@edit');
    Route::post('admin/category/update/{id}', 'Admin\AdminCategoryController@update');
    Route::get('admin/category/delete/{id}', 'Admin\AdminCategoryController@destroy');
});


