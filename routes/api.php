<?php

use App\Http\Controllers\AuthenticationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware(['treblle'])->group(function () {

Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::put('/update', [AuthenticationController::class, 'updateDetails']);
    Route::delete('/delete', [AuthenticationController::class, 'deleteAccount']);
    Route::post('logout', [AuthenticationController::class, 'logout']);
});
// });
