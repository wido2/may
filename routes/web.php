<?php

use App\Core\Dashboard;
use App\Core\Auth\Login;
use App\Core\Auth\Register;
use App\Core\Barang\Listbarang;
use App\Core\Satuan\ListSatuan;
use Illuminate\Routing\RouteGroup;
use App\Core\Category\ListCategory;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/register', Register::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
    Route::get('dashboard', Dashboard::class)->name('dashboard');
    Route::get('/', Dashboard::class)->name('home');
    Route::get('category', ListCategory::class)->name('category');
    Route::get('satuan', ListSatuan::class)->name('satuan');
    Route::get('barang', Listbarang::class)->name('barang');
});
