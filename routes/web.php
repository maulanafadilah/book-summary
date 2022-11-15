<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Library\BooksController;
use App\Http\Controllers\Library\ChapterController;

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

Route::get('/', 'App\Http\Controllers\Library\BooksController@index')->name('home')->middleware('auth');
Route::get('/profile', 'App\Http\Controllers\Library\ProfileController@index')->name('profile')->middleware('auth');
Route::resource('/book', BooksController::class)->middleware('auth');
Route::resource('/chapter', ChapterController::class, ['except' => 'create'])->middleware('auth');
Route::get('/chapter/create/{id}', [
    'as' => 'chapter.create',
    'uses' => 'App\Http\Controllers\Library\ChapterController@create'
])->middleware('auth');

Route::get('/login', 'App\Http\Controllers\Authentication\LoginController@index')->name('login')->middleware('guest');
Route::post('/login', 'App\Http\Controllers\Authentication\LoginController@authenticate');
Route::post('/logout', 'App\Http\Controllers\Authentication\LoginController@logout');
Route::get('/logout', 'App\Http\Controllers\Authentication\LoginController@logout');

Route::get('/register', 'App\Http\Controllers\Authentication\RegisterController@index')->middleware('guest');
Route::post('/register', 'App\Http\Controllers\Authentication\RegisterController@store');