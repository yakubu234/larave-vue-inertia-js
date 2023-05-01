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
Route::post('login', [AuthenticationController::class, 'login'])->name('login');
Route::post('register', [AuthenticationController::class, 'register'])->name('register');
Route::get('show-register-page', [AuthenticationController::class, 'showRegisterPage'])->name('show.register.page');
Route::get('show-dashboard', [AuthenticationController::class, 'showDashboard'])->name('show.dashboard');

Route::middleware('auth')->group(function () {
    Route::put('/update', [AuthenticationController::class, 'updateDetails'])->name('update');
    Route::delete('/delete', [AuthenticationController::class, 'deleteAccount'])->name('delete');
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
    Route::get('/dashboard', [AuthenticationController::class, 'showDashboard'])->name('show.dashboard');
});
