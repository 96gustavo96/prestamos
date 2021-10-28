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
<<<<<<< HEAD
Route::get('/pagos.edit', function () {
    return 'hola';
});

=======
>>>>>>> 27f82ce3321fe752273999e68a6b2ee9ce266b97

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
