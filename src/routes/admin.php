<?php

use Illuminate\Support\Facades\Route;
use Edguy\AdminPanel\Http\Controllers\ImageController;
use Edguy\AdminPanel\Http\Controllers\SeoController;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;

Route::prefix('admin')->middleware('guest.admin')->group(function () {

Route::view('/', 'auth.login')->name('auth');

Route::match(['get', 'post'],'/login')->middleware('admin.login')->name('login');

Route::middleware('auth.admin')->group(function () {

    Route::get('laravel_logs', [LogViewerController::class, 'index'])->name('laralogs.index');

    Route::match(['get', 'post'], '/logout')->middleware('admin.logout')->name('logout');

    Route::view('/main', 'admin.index')->name('index');

    Route::get('/delete_image/{id}', [ImageController::class, 'destroy'])->name('images.delete');


    Route::resources([
            'seos' => SeoController::class,
        ]);
    });

});

