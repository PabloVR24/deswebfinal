<?php

use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;

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
    return view('index');
});

Route::view('/', 'users.index');
Route::view('login', 'admin.login')->name('login')->middleware('guest');
Route::view('dashboard', 'admin.dashboard')->middleware('auth');

Route::post('login', [loginController::class, 'login']);
Route::post('logout', [loginController::class, 'logout']);
