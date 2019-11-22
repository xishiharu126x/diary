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

// Route::get('/', function () {
//     return view('welcome');
// });

//'このURLのとき'、'コントローラー＠メソッド'   //↓好きな名前でok
Route::get('/','DiaryController@index')->name('diary.index');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    //この中に書かれたルートはログインしていないと見れなくなる
    Route::get('/diary/create','DiaryController@create')->name('diary.create');

    Route::post('/diary/store','DiaryController@store')->name('diary.store');

    Route::delete('/diary/{id}','DiaryController@destroy')->name('diary.destroy');

    Route::get('/diary/{diary}/edit','DiaryController@edit')->name('diary.edit');

    Route::put('/diary/{id}/update','DiaryController@update')->name('diary.update');

    Route::post('/diary/{id}/like','DiaryController@like')->name('diary.like');

    Route::post('/diary/{id}/dislike','DiaryController@dislike')->name('diary.dislike');

});
