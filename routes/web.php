<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'users'], function () {
    // Menampilkan daftar pengguna
    Route::get('/', [UserController::class, 'index']);

    // Menampilkan formulir untuk membuat pengguna baru
    Route::get('/create', [UserController::class, 'create']);

    // Menyimpan pengguna baru ke dalam database

    Route::post('/', [UserController::class, 'store']);

    // Menampilkan informasi tentang pengguna tertentu
    Route::get('/{user}', [UserController::class, 'show']);

    // Menampilkan formulir untuk mengedit pengguna
    Route::get('/{user}/edit', [UserController::class, 'edit']);

    // Menyimpan perubahan pengguna ke dalam database
    Route::put('/{user}', [UserController::class, 'update']);

    // Menghapus pengguna dari database
    Route::delete('/{user}', [UserController::class, 'destroy']);
});
