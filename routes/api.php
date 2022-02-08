<?php

use App\Http\Controllers\Api\ApiAttributeController;
use App\Http\Controllers\Api\ApiCategoryController;
use App\Http\Controllers\Api\ApiNewController;
use App\Http\Controllers\Api\ApiProductController;
use App\Http\Controllers\Api\NewController;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/products', function () {
        return 'products';
    });
    Route::get('/logout', [ApiController::class, 'logout']);
    Route::get('/user', [ApiController::class, 'user']);
});
Route::post('/login', [ApiController::class, 'login']);
Route::post('/register', [ApiController::class, 'register']);

Route::prefix('category')->group(function () {
    Route::get('/', [ApiCategoryController::class, 'index']);
    Route::get('/{id}', [ApiCategoryController::class, 'getId']);
    Route::post('/create', [ApiCategoryController::class, 'create']);
    Route::post('/edit/{id}', [ApiCategoryController::class, 'edit']);
    Route::delete('/{id}', [ApiCategoryController::class, 'delete']);
});

Route::prefix('products')->group(function () {
    Route::get('/', [ApiProductController::class, 'index']);
    Route::get('/{id}', [ApiProductController::class, 'show']);
    Route::post('/create', [ApiProductController::class, 'create']);
    Route::post('/edit/{id}', [ApiProductController::class, 'edit']);
    Route::delete('/{id}', [ApiProductController::class, 'delete']);
});

Route::prefix('product-attribute')->group(function () {
    Route::get('/', [ApiAttributeController::class, 'index']);
    Route::post('/create', [ApiAttributeController::class, 'create']);
});
