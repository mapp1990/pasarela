<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaceToPayController;

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

Route::get('/producto', [ProductoController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/verificacion_informacion', [ProductoController::class, 'verificacion']);
Route::post('/guardar_enviar_orden', [PlaceToPayController::class, 'createPayRequest']);
Route::get('/callback/{ref}', [PlaceToPayController::class, 'callbackHandler']);