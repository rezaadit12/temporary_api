<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

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

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [NewsController::class, 'login'])->name('loginProses');

Route::get('/', [NewsController::class, 'index']);

Route::middleware('auth:sanctum')->group(function(){
        Route::prefix('/berita')->name('berita.')->group(function(){
        Route::get('/tambah', [NewsController::class, 'create'])->name('create');
        Route::post('/tambah', [NewsController::class, 'store'])->name('store');
    });
});






