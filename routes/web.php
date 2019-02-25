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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sites', 'SiteController@index')->name('allsites');
Route::get('/site/categories', 'SiteController@categories')->name('allcategories');
Route::get('/site/{Site}', 'SiteController@site')->name('sitepage');
Route::get('/site/category/{Category}', 'SiteController@category')->name('categorypage');

Route::get('/home/event', 'HomeController@event')->name('event');

Route::get('/home/moviegame', 'MovieGameController@index')->name('moviegame');
Route::get('/home/moviegame/join', 'MovieGameController@join')->name('joinmoviegame');
Route::post('/home/moviegame/test', 'MovieGameController@test')->name('testmoviegame');


Route::post('/home/chat/message', 'HomeController@createChatMessage')->name('createChatMessage');

