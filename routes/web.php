<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseConnectionController;
use App\Http\Controllers\ClienteController;

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
    return view('inicio');
});
Route::get('/test-database-connection', [DatabaseConnectionController::class, 'testConnection']);
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes-vista', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('/clientes-vista/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('/clientes-vista/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes-vista/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

