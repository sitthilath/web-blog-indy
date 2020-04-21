<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
Route::group(['middleware' => ['auth','admin']],function(){

    Route::get('/admin.dashboard',function(){
        return view('admin.dashboard');
    });

});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/main', 'ShowIndexController@showblog');



//Route Blog
Route::get('/admin.blogmanage','BlogController@index')->middleware('auth');
Route::post('/done.blog','BlogController@store')->middleware('auth');
Route::delete('/del.blog/{id}','BlogController@destroy')->middleware('auth');
Route::get('/edit.blog/{id}','BlogController@edit')->middleware('auth');
Route::put('/update.blog/{id}','BlogController@update')->middleware('auth');
Route::get('/readmore/{id}','BlogController@show');
Route::get('/insertblog', function () {
    return view('admin.crudblog.insert');
})->middleware('auth');

//Route user
Route::get('/admin.usermanage','UserController@index')->middleware('admin');
Route::post('/done.user','UserController@store')->middleware('admin');
Route::delete('/del.user/{id}','UserController@destroy')->middleware('admin');
Route::get('/edit.user/{id}','UserController@edit')->middleware('admin');
Route::put('/update.user/{id}','UserController@update')->middleware('admin');

Route::get('/insertuser', function () {
    return view('admin.cruduser.insert');
})->middleware('admin');