<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\FrontController;
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

Route::controller(FrontController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/posts/{post}', 'show')->name('posts.show');
});

Route::middleware(['auth', 'verified'])->controller(BackController::class)->group(function () {
    Route::get('/dashboard', 'index')->name('dashboard');
    Route::get('/dashboard/create', 'new')->name('posts.create');
    Route::post('/dashboard/create', 'store')->name('posts.store');
    Route::get('/dashboard/edit/{post}', 'edit')->name('posts.edit');
    Route::put('/dashboard/edit/{post}', 'update')->name('posts.update');
    Route::delete('/dashboard/delete/{post}', 'delete')->name('posts.destroy');
});
require __DIR__.'/auth.php';
