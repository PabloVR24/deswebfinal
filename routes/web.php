<?php

use App\Http\Controllers\clientesController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\noticiasController;
use App\Http\Controllers\registrosController;
use App\Http\Controllers\serviciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BotManController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\sugerenciasController;


Route::view('/', 'users.template');


Route::view('login', 'admin.login')->name('login')->middleware('guest');


Route::get('dashboard', [registrosController::class, 'mostrarRegistros'])->name('dashboard')->middleware('auth');
Route::view('template', 'users.template');


Route::post('login', [loginController::class, 'login']);
Route::post('logout', [loginController::class, 'logout']);


Route::resource('clientes', clientesController::class)->middleware('auth');
Route::resource('servicios', serviciosController::class)->middleware('auth');
Route::resource('registros', registrosController::class)->middleware('auth');
Route::resource('noticias', noticiasController::class)->middleware('auth');
Route::resource('sugerencias', sugerenciasController::class)->middleware('auth');


Route::view('chatbot', 'chatbot');
Route::match(['get', 'post'], '/botman', [BotManController::class, 'handle']);


Route::view('todo', 'todo');
Route::get('todo', [noticiasController::class, 'indexGuest']);


Route::view('usrservicios', 'users.servicios');
Route::get('usrservicios', [serviciosController::class, 'indexall']);

Route::view('client', 'users.client');
Route::view('hire', 'users.hire')->name('hire');

Route::view('success', 'users.success')->name('success');


Route::get('usrservicios/{id}', [ServiciosController::class, 'findService'])->name('users.servicio');
Route::get('findRegister', [registrosController::class, 'findregister'])->name('findRegister');
Route::get('export/{id}', [registrosController::class, 'export'])->name('export');
Route::get('exportsrv/{id}', [serviciosController::class, 'export'])->name('exportsrv');

Route::get('client', [clientesController::class, 'findregister'])->name('client');
Route::get('findClient', [registrosController::class, 'findClient'])->name('findClient');

Route::post('clientRegister', [clientesController::class, 'register'])->name('clientRegister');

Route::post('hireService', [registrosController::class, 'hireService'])->name('hireService');

Route::get('todo', [noticiasController::class, 'indexGuest']);
Route::post('send', [ChatBotController::class, 'sendChat']);
