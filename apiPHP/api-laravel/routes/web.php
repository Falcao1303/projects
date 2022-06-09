<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bank\OperationsController;
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

Route::post('/reset', [OperationsController::class, 'resetRegisters']);
Route::get('/balance', [OperationsController::class, 'getRegisters']);
Route::post('/event', [OperationsController::class, 'event']);