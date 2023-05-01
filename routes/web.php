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

Route::get('show-login-page', [AuthenticationController::class, 'showLoginPage'])->name('show.login.page');
Route::post('login', [AuthenticationController::class, 'login']);
Route::get('show-register-page', [AuthenticationController::class, 'showRegisterPage'])->name('show.register.page');
Route::get('show-dashboard', [AuthenticationController::class, 'showDashboard'])->name('show.dashboard');
