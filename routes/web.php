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
use App\Article;
use App\Tag;

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');
Route::resource('profiles', 'ProfileController');
Route::resource('articles', 'ArticleController');
Route::resource('comments', 'CommentController');
Route::get('/users/{id}/articles', 'ArticleController@articles');

// view the welcome page
Route::get('/', 'ArticleController@main');




/* Route::resource('tasks', 'TaskController');
 */


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
