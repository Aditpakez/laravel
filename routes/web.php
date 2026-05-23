<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

route::middleware('auth')->group(function(){


Route::get('/', function () {
    return view('welcome');
});

Route::resource('fakultas', FakultasController::class);
Route::resource('prodi', ProdiController::class);
});