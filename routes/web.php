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



Route::get('/', 'HomePageController@index')->name('home_page');


Auth::routes();

Route::group(['middleware' => 'auth'], function() {
	Route::get('/home', 'HomeController@index')->name('home');

	// book
	Route::resource('/books', 'BooksController');
});

Route::get('/article', 'ArticleController@index')->name('article_index');

Route::resource('pages', 'PagesController');
Route::resource('posts', 'PostsController');