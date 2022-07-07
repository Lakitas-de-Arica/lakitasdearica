<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@home')->name('home');
Route::get('/introduccion', 'HomeController@introduction')->name('introduction');
Route::get('/historia', 'HomeController@history')->name('history');
Route::get('/contacto', 'HomeController@contact')->name('contact');
Route::get('/noticias', 'NewsController@index')->name('news');
Route::get('/noticias/publicar', 'NewsController@publish')->name('news.publish');
Route::get('/noticias/{slug}', 'NewsController@show')->name('news.show');

Route::get('/comparsas', 'ComparsaController@index')->name('comparsa');
Route::get('/comparsas/publicar', 'ComparsaController@publish')->name('comparsa.publish');
Route::get('/comparsas/{slug}', 'ComparsaController@show')->name('comparsa.show');
