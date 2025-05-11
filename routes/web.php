<?php

use App\Http\Controllers\UserContoller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(UserContoller::class)->group(function () {
    Route::get('/users', 'showUsers')->name('users');
    Route::get('/users/{id}', 'singleUser')->name('view.user');

    Route::post('/add', 'addUser')->name('add.user');
    Route::put('/update/{id}', 'updateUser')->name('update.user');
    Route::get('/updatepage/{id}', 'updatePage')->name('update.page');
    // Route::get('/delete/{id}', 'deleteUser')->name('delete.user');
    Route::get('/delete', 'deleteAllUsers')->name('delete.user');
    Route::view('/newuser', 'adduser');
});
