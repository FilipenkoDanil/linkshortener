<?php

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

Auth::routes();

Route::get('/links', [\App\Http\Controllers\UserController::class, 'stats'])->name('my-links')->middleware('auth');
Route::post('/delete_link/{link}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('delete-link')->middleware('auth');

Route::get('/', [\App\Http\Controllers\LinkController::class, 'index'])->name('home');
Route::post('/cc', [\App\Http\Controllers\LinkController::class, 'store'])->name('gen-shorten-link');
Route::get('/{code}', [\App\Http\Controllers\LinkController::class, 'shortenLink'])->name('shorten-link');
