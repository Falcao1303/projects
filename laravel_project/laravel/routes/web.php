<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home\RegisterController;
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

Route::get('/register', [RegisterController::class, 'index']);
Route::get('/register/getRegisters', [RegisterController::class, 'getRegisters']);
Route::post('/register/saveRegister', [RegisterController::class, 'saveRegister']);