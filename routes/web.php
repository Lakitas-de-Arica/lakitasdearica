<?php

use Illuminate\Support\Facades\Route;

Route::get('login', 'Auth\LoginController@getLogin')->name('getLogin');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::prefix('password')->group(function () {

    Route::get('reset', 'Auth\ResetPasswordController@getPasswordEmail')->name('password.request');
    Route::post('reset', 'Auth\ResetPasswordController@resetPassword')->name('password.update');
    Route::get('reset/{token}', 'Auth\ResetPasswordController@getResetPassword')->name('password.reset');
    Route::post('forgot', 'Auth\ResetPasswordController@forgotPassword')->name('password.forgot');

});

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

Route::middleware(['auth','verified'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', 'Backend\AdminController@index')->name('admin');
        Route::get('/noticias', 'Backend\AdminNewsController@index')->name('admin.news');
        Route::get('/noticias/create', 'Backend\AdminNewsController@create')->name('admin.news.create');
        Route::get('/noticias/{id}/edit', 'Backend\AdminNewsController@edit')->name('admin.news.edit');
        Route::get('/noticias/{id}/delete', 'Backend\AdminNewsController@delete')->name('admin.news.delete');
        Route::get('/comparsas', 'Backend\AdminComparsaController@index')->name('admin.comparsas');

    });
});
