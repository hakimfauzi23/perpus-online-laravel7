<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;

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
    Alert::success('Success Title', 'Success Message'); 
    return view('welcome');
});

//Books
Route::get('/books', 'BookController@index')->name('books.index');
Route::get('/books/create', 'BookController@create')->name('create.books');
Route::post('/books/store', 'BookController@store')->name('store.books');
Route::get('/books/edit/{data}', 'BookController@edit')->name('books.edit');
Route::put('/books/update/{data}', 'BookController@update')->name('books.update');
Route::get('/books/destroy/{data}', 'BookController@destroy')->name('books.destroy');


