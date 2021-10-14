<?php

use App\Http\Controllers\PromotionalCodeController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/my_promotional_codes', [PromotionalCodeController::class, 'index'])->name('promotional_codes')->middleware('auth');
Route::get('/get_the_code', [PromotionalCodeController::class, 'createNewCode'])->middleware('auth');
Route::get('/claim_code/{id}', [PromotionalCodeController::class, 'claimCode'])->middleware('auth');