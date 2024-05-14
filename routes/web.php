<?php

use App\Http\Controllers\contlang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;

Route::post('/get-actors', [ApiController::class, 'getActorsNames'])->name('get-actors');


Route::get('/', function () {
    return view('page');
})->name('home');


Route::get('locale/{lang}',[contlang::class,'setLocale'])->name('locale');

Route::post('/submitdata', [UserController::class, 'submitdata'])->name('submitdata');

Route::post('/Registration',[UserController::class,'registration'])->name('Registration');
