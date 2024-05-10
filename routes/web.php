<?php

use App\Http\Controllers\contlang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('page');
});


Route::get('locale/{lang}',[contlang::class,'setLocale'])->name('locale');