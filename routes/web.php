<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('/', [App\Http\Controllers\HomeController::class, 'fileindex'])->name('home');
    Route::get('/file/{id}', [App\Http\Controllers\HomeController::class, 'viewFile'])->name('file.view');
    Route::get('/upload-file', [App\Http\Controllers\HomeController::class, 'index'])->name('upload.file');
    Route::post('file-import', [App\Http\Controllers\HomeController::class, 'importFile'])->name('file.import');