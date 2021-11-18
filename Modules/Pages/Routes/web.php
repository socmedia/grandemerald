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
    'prefix' => 'admin/halaman',
    'middleware' => 'auth',
    'as' => 'adm.pages.',
], function () {
    Route::get('/', 'PagesController@index')->name('index');
    Route::get('/tambah', 'PagesController@create')->name('create');
    Route::get('/edit/{id}', 'PagesController@edit')->name('edit');
    Route::get('/daftar/{id}', 'PagesController@list')->name('list');
});
