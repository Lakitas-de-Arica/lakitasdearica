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
Route::get('/historia/comparsas-historicas', 'HomeController@comparsasHistoricas')->name('history.comparsashistoricas');
Route::get('/historia/viejos-sopladores', 'HomeController@viejosSopladores')->name('history.viejossopladores');

Route::get('/contacto', 'HomeController@contact')->name('contact');
Route::get('/noticias', 'NewsController@index')->name('news');
Route::get('/noticias/publicar', 'NewsController@publish')->name('news.publish');
Route::get('/noticias/{slug}', 'NewsController@show')->name('news.show');

Route::get('/comparsas', 'ComparsaController@index')->name('comparsa');
Route::get('/comparsas/publicar', 'ComparsaController@publish')->name('comparsa.publish');
Route::get('/comparsas/{slug}', 'ComparsaController@show')->name('comparsa.show');

Route::get('/multimedia', 'MultimediaController@index')->name('multimedia');
Route::get('/multimedia/{slug}', 'MultimediaController@show')->name('multimedia.show');

Route::middleware(['auth','verified'])->group(function () {
    Route::prefix('admin')->group(function () {

        Route::get('/', 'Backend\AdminController@index')->name('admin');

        Route::prefix('noticias')->group(function () {
            Route::get('/', 'Backend\AdminNewsController@index')->name('admin.news');
            Route::get('/create', 'Backend\AdminNewsController@create')->name('admin.news.create');
            Route::get('/{id}/edit', 'Backend\AdminNewsController@edit')->name('admin.news.edit');
            Route::get('/{id}/delete', 'Backend\AdminNewsController@delete')->name('admin.news.delete');
        });

        Route::prefix('comparsas')->group(function () {
            Route::get('/', 'Backend\AdminComparsaController@index')->name('admin.comparsa');
            Route::get('/create', 'Backend\AdminComparsaController@create')->name('admin.comparsa.create');
            Route::get('/{id}/edit', 'Backend\AdminComparsaController@edit')->name('admin.comparsa.edit');
            Route::get('/{id}/delete', 'Backend\AdminComparsaController@delete')->name('admin.comparsa.delete');
        });

        Route::prefix('multimedia')->group(function () {
            Route::get('/', 'Backend\AdminMultimediaController@index')->name('admin.multimedia');
            Route::get('/create', 'Backend\AdminMultimediaController@create')->name('admin.multimedia.create');
            Route::get('/{id}/edit', 'Backend\AdminMultimediaController@edit')->name('admin.multimedia.edit');
            Route::get('/{id}/delete', 'Backend\AdminMultimediaController@delete')->name('admin.multimedia.delete');
        });

        Route::prefix('paginas')->group(function () {

            Route::get('/', 'Backend\AdminPagesController@index')->name('admin.pages');
            Route::get('/{page}/edit', 'Backend\AdminPagesController@edit')->name('admin.pages.edit');

        });

    });
});
