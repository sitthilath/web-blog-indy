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
Route::get('/admin.blogmanage','BlogController@index');
Route::post('/done.blog','BlogController@store');
Route::delete('/del.blog/{id}','BlogController@destroy');
Route::get('/edit.blog/{id}','BlogController@edit');
Route::put('/update.blog/{id}','BlogController@update');
Route::get('/readmore/{id}','BlogController@show');
Route::get('/insertblog', function () {
    return view('admin.crudblog.insert');
});

//Route user
Route::get('/admin.usermanage','UserController@index');
Route::post('/done.user','UserController@store');
Route::delete('/del.user/{id}','UserController@destroy');
Route::get('/edit.user/{id}','UserController@edit');
Route::put('/update.user/{id}','UserController@update');

Route::get('/insertuser', function () {
    return view('admin.cruduser.insert');
});