<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Маршрут для входа на сайт
Route::get('/', 'App\Http\Controllers\MainController@enter')->name('enter');
Route::post('/enter/check', 'App\Http\Controllers\MainController@enter_check');

// Маршрут для регистрации нового пользователя
Route::get('/register', 'App\Http\Controllers\MainController@register')->name('register');
Route::post('/register', 'App\Http\Controllers\MainController@register');
Route::post('/register/check', 'App\Http\Controllers\MainController@register_check');

// Маршрут для домашней страницы пользователя
Route::get('/home', 'App\Http\Controllers\MainController@home')->name('home');

// Маршрут для страницы "О нас"
Route::get('/about', 'App\Http\Controllers\MainController@about');

// Маршрут для страницы отзывов
Route::get('/review', 'App\Http\Controllers\MainController@review')->name('review');
Route::post('/review/check', 'App\Http\Controllers\MainController@review_check');

// Маршрут для выхода из системы
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
})->name('logout');