<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttesController;
use App\Http\Controllers\UsersController;

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

// 打刻画面
Route::get('/', 'App\Http\Controllers\AttesController@index')->name('index');
Route::post('/', 'App\Http\Controllers\AttesController@index')->name('index');

// 打刻機能
Route::group(['middleware' => 'auth'], function() {
    Route::post('/enter_time', 'App\Http\Controllers\AttesController@enter_time')->name('enter_time');
    Route::post('/exit_time', 'App\Http\Controllers\AttesController@exit_time')->name('exit_time');
    Route::post('/reststart_time', 'App\Http\Controllers\AttesController@reststart_time')->name('reststart_time');
    Route::post('/restend_time', 'App\Http\Controllers\AttesController@restend_time')->name('restend_time');
});

// リレーション
Route::prefix('atte')->group(function () {
    Route::get('', [AttesController::class, 'atte']);
});

// 勤怠確認ページ
Route::get('/attendance', 'App\Http\Controllers\UsersController@attendance')->name('attendance');
Route::post('/attendance', 'App\Http\Controllers\UsersController@attendance')->name('attendance');