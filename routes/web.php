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
Auth::routes();

Route::get('/', 'TableAppController@index')
    ->name('tableapp.index');
Route::get('/create', 'TableAppController@create')
    ->name('tableapp.create');
Route::put('/create', 'TableAppController@store')
    ->name('tableapp.store');
Route::put('/close/{id}', 'TableAppController@close')
    ->name('tableapp.close');

//Админская часть
Route::get('/answer{id}/', 'TableAppController@answer')
    ->name('tableapp.answer');
Route::put('/answer', 'TableAppController@response')
    ->name('tableapp.response');