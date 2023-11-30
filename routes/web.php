<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLoginMiddleware;
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
Route::get('/user/{last_name}/{first_name}', [UserController::class, 'getUserInfo']);

Route::get('/login', [LoginController::class, 'showLoginForm']);
Route::post('/check-login', [CheckLoginMiddleware::class, 'check-login'])->middleware('check-login');
