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
Route::post('/home-task/store', 'HomeController@store')->name('todo.home.task.store');
Route::get('/home-task/update/{id}', 'HomeController@update')->name('todo.home.task.update');
Route::get('/home-task/delete/{id}', 'HomeController@delete')->name('todo.home.task.delete');
//Office Task
Route::get('/office-task/view', 'OfficeController@view')->name('todo.office.task.view');
Route::post('/office-task/store', 'OfficeController@store')->name('todo.office.task.store');
Route::get('/office-task/update/{id}', 'OfficeController@update')->name('todo.office.task.update');
Route::get('/office-task/delete/{id}', 'OfficeController@delete')->name('todo.office.task.delete');
//Life Task
Route::get('/life-task/view', 'LifeController@view')->name('todo.life.task.view');
Route::post('/life-task/store', 'LifeController@store')->name('todo.life.task.store');
Route::get('/life-task/update/{id}', 'LifeController@update')->name('todo.life.task.update');
Route::get('/life-task/delete/{id}', 'LifeController@delete')->name('todo.life.task.delete');
