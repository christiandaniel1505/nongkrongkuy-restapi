<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanHomeUserController;
use App\Http\Controllers\HalamanAdminController;
use App\Http\Controllers\DaftarCafeAdminController;
use App\Http\Controllers\DaftarCafeUserController;
use App\Http\Controllers\MenuAdminController;
use App\Http\Controllers\MenuUserController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [HalamanHomeUserController::class, 'index']);
Route::resource('/home', HalamanAdminController::class);
Route::resource('/admin', AdminController::class);
Route::resource('/daftar', DaftarCafeAdminController::class);
Route::resource('/menu', MenuAdminController::class);
Route::resource('/menu_user', MenuUserController::class);
Route::resource('/daftar_user', DaftarCafeUserController::class);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
