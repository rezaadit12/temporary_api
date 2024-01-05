<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function(){

    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/me', [AuthController::class, 'me']);
    Route::get('/posts/{id}', [PostController::class, 'show']);
    Route::post('/posts', [PostController::class, 'store']);
    Route::patch('/posts/{id}', [PostController::class, 'update'])->middleware('IsWriter');
    Route::delete('/posts/{id}', [PostController::class, 'destroy'])->middleware('IsWriter');
    Route::post('/comment', [CommentController::class, 'store']);
    Route::patch('/comment/{id}', [CommentController::class, 'update'])->middleware('c-crator');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->middleware('c-crator');

});


Route::get('/posts', [PostController::class, 'index']);


Route::post('/login', [AuthController::class, 'login']);