<?php

use App\Http\Controllers\clientesController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\noticiasController;
use App\Http\Controllers\registrosController;
use App\Http\Controllers\serviciosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sugerenciasController;

//VIEWS
Route::view('/', 'users.template');
Route::view('login', 'admin.login')->name('login')->middleware('guest');
Route::view('template', 'users.template');
Route::view('todo', 'todo');
Route::view('usrservicios', 'users.servicios');
Route::view('client', 'users.client');
Route::view('hire', 'users.hire')->name('hire');
Route::view('success', 'users.success')->name('success');


//RESOURCES
Route::resource('clientes', clientesController::class)->middleware('auth');
Route::resource('servicios', serviciosController::class)->middleware('auth');
Route::resource('registros', registrosController::class)->middleware('auth');
Route::resource('noticias', noticiasController::class)->middleware('auth');
Route::resource('sugerencias', sugerenciasController::class)->middleware('auth');


//GET
Route::get('dashboard', [registrosController::class, 'mostrarRegistros'])->name('dashboard')->middleware('auth');
Route::get('todo', [noticiasController::class, 'indexGuest']);
Route::get('usrservicios', [serviciosController::class, 'indexall']);
Route::get('usrservicios/{id}', [ServiciosController::class, 'findService'])->name('users.servicio');
Route::get('findRegister', [registrosController::class, 'findregister'])->name('findRegister');
Route::get('export/{id}', [registrosController::class, 'export'])->name('export');
Route::get('exportsrv/{id}', [serviciosController::class, 'export'])->name('exportsrv');
Route::get('client', [clientesController::class, 'findregister'])->name('client');
Route::get('findClient', [registrosController::class, 'findClient'])->name('findClient');
Route::get('todo', [noticiasController::class, 'indexGuest']);


//POST
Route::post('login', [loginController::class, 'login']);
Route::post('logout', [loginController::class, 'logout']);
Route::post('clientRegister', [clientesController::class, 'register'])->name('clientRegister');
Route::post('hireService', [registrosController::class, 'hireService'])->name('hireService');
Route::post('send', [ChatBotController::class, 'sendChat']);
