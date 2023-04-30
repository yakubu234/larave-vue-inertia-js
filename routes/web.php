<?php

use App\Http\Controllers\AuthenticationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('showLoginPage', [AuthenticationController::class, 'showLoginPage'])->name('login');
Route::get('showRegisterPage', [AuthenticationController::class, 'showRegisterPage'])->name('register');
Route::get('showDashboard', [AuthenticationController::class, 'showDashboard'])->name('dashboard');
