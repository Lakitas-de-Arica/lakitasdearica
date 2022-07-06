<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home')->name('home');
Route::get('/noticias', 'NewsController@index')->name('news');
Route::get('/noticias/{slug}', 'NewsController@show')->name('news.show');
