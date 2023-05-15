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
Route::view('poliza', 'users.poliza')->name('poliza');
Route::view('Por_que_nosotros', 'users.Por_que_nosotros')->name('Por_que_nosotros');
Route::view('allServices', 'users.allServices')->name('allServices');
Route::view('mas_servicios', 'users.mas_servicios')->name('mas_servicios');
Route::view('tecnologia', 'users.tecnologia')->name('tecnologia');
Route::view('resellers', 'users.resellers')->name('resellers');
Route::view('FAQ', 'users.FAQ')->name('FAQ');
Route::view('todo', 'todo');
Route::view('usrservicios', 'users.servicios');
Route::view('client', 'users.client');
Route::view('hire', 'users.hire')->name('hire');
Route::view('success', 'users.success')->name('success');
Route::view('export', 'users.export')->name('export');
Route::view('sugerencias', 'admin.sugerencias')->name('sugerencias');
Route::view('compañia', 'users.compañia')->name('compañia');
Route::view('FAQ', 'users.FAQ')->name('FAQ');
Route::view('clientesSH', 'users.clientesSH')->name('clientesSH');
Route::view('soluciones', 'users.soluciones')->name('soluciones');
Route::view('contacto', 'users.contacto')->name('contacto');


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
Route::get('web_hosting', [serviciosController::class, 'indexHosting'])->name('web_hosting');
Route::get('dominios', [serviciosController::class, 'indexDomains'])->name('dominios');
Route::get('servidor_dedicado', [serviciosController::class, 'indexDedicated'])->name('servidor_dedicado');
Route::get('allServices', [serviciosController::class, 'allServices'])->name('allServices');

//POST
Route::post('login', [loginController::class, 'login']);
Route::post('logout', [loginController::class, 'logout']);
Route::post('clientRegister', [clientesController::class, 'register'])->name('clientRegister');
Route::post('hireService', [registrosController::class, 'hireService'])->name('hireService');
Route::post('send', [ChatBotController::class, 'sendChat']);
