<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SucursalesController;
use App\Http\Controllers\ClientesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/usuarios',UsersController::class);
Route::resource('/sucursales',SucursalesController::class);
Route::resource('/clientes',ClientesController::class);

// //Clear Config cache:
Route::get('/allSucursales', function() {return Sucursal::all(); })->name('allSucursales');