<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CuentaController;
use App\Http\Controllers\PagoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/clientes',ClienteController::class);
Route::resource('/cuentas', CuentaController::class);
Route::resource('/pagos', PagoController::class);

//Route::get('/pagos/mostrar/',['App\Http\Controllers\PagoController','mostrar'])->name ('pagos.pagados');
Route::get('/pagos/mostrar/{id}', [PagoController::class, 'mostrar']);


Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
})->name('dashboard');
/* Route::middleware(['auth:sanctum', 'verified'])->get('/pagos', function () {
    return view('pagos');
})->name('dashboard'); */
