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
Route::get('/demo', function(){return view('demo');})->name('demo');


Route::get('/header/edit','HeaderController@edit')->name('header.edit');
Route::put('/header/update','HeaderController@update')->name('header.update');

Route::get('/footer/edit','FooterController@edit')->name('footer.edit');
Route::put('/footer/update','FooterController@update')->name('footer.update');

Route::resource('/news', 'NewsController');
Route::resource('/album','AlbumController');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

