<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware("auth:api")->group(function (){
    Route::get('/posts', [PostController::class, 'index']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::post('mock-api/posts', [ApiController::class, 'posts']);
Route::post('mock-api/comments', [ApiController::class, 'comments']);

// routes/api.php

Route::get('/api/mock-api/{segment}', [ApiController::class, 'main']);