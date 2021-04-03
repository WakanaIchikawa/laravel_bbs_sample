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

Route::get('/', "bbsEntryController@index");
Route::post('/create', "bbsEntryController@create");
Route::get('/comments/{id}/edit', 'commentsController@edit');

// Route::get('/', function () {
//     return view('welcome');
// });
