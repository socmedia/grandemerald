<?php

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

Route::group([
    'as' => 'adm.gallery.',
    'middleware' => ['auth'],
    'prefix' => 'admin/galeri',
], function () {
    Route::get('/', 'GalleryController@index')->name('index');
    Route::get('/tambah', 'GalleryController@create')->name('create');
    Route::get('/sampah', 'GalleryController@trash')->name('trash');
    Route::get('/{email}', 'GalleryController@userGallery')->name('userGallery');
    Route::get('/edit/{id}', 'GalleryController@edit')->name('edit');
});