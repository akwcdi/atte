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

// インデックスページ
Route::get('/', 'App\Http\Controllers\AttesController@index')->name('index');
Route::post('/', 'App\Http\Controllers\AttesController@index')->name('index');

Route::group(['middleware' => 'auth'], function() {
    Route::post('/enter_time', 'App\Http\Controllers\AttesController@enter_time')->name('enter_time');
    Route::post('/exit_time', 'App\Http\Controllers\AttesController@exit_time')->name('exit_time');
    Route::post('/reststart_time', 'App\Http\Controllers\AttesController@reststart_time')->name('reststart_time');
    Route::post('/restend_time', 'App\Http\Controllers\AttesController@restend_time')->name('restend_time');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
