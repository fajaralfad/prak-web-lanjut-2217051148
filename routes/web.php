<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

// Route ke halaman profil pengguna
Route::get('/user/profile', [UserController::class, 'profile']);

// Route untuk menampilkan form create user
Route::get('/user/create', [UserController::class, 'create']);

// Route untuk menyimpan data user
Route::post('/user/store', [UserController::class, 'store']);

Route::get('/users', [UserController::class, 'index'])->name('users.index');

Route::get('/user/{id}', [UserController::class, 'show'])->name('users.show');