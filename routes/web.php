<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;


Route::controller(ContactController::class)
    ->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/confirm', 'confirm')->name('confirm');
        Route::post('/thanks', 'thanks')->name('thanks');
        Route::get('/manager', 'manager')->name('manager');
        Route::post('/delete/{id}', 'delete');
    });
