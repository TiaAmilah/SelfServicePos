<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController; // Perubahan: UserController ditambahkan 's' pada Controllers
use App\Http\Controllers\ProdukController; // Perubahan: ProdukController ditambahkan 's' pada Controllers

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


Auth::routes();
Route::get('/produk_vue', function () {
    return view('product_page');
});

Route::get('/user', [UserController::class, 'index']); // Perubahan: Menggunakan UserController dan method index
Route::get('/produk', [ProdukController::class, 'index']); // Perubahan: Menggunakan ProdukController dan method index
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return 'Halaman About';
});

Route::get('/about-us', function () { // Perubahan: Merapikan path route '/about-us'
    $data = [
        'pageTitle' => 'Tentang Kami',
        'content' => 'Ini adalah halaman tentang kami.'
    ];
    return view('about', $data);
});

Route::get('/profile', function () {
    $nama = "Tia A ";
    return view('profile.index', compact('nama'));
});

//Route::resource('/product', 'App\http\controllers\Productcontroller');


Route::middleware(['auth', 'user', 'admin'])->group(function () {
    Route::resource('/produk', 'App\Http\Controllers\ProdukController');
});

// Route::resource('/product_vue', 'TaskController');

// Route::resource('/product', 'App\Http\Controllers\ProductController');