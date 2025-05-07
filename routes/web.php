<?php

use App\Core\Barang\Listbarang;
use App\Core\Category\ListCategory;
use App\Core\Dashboard;
use App\Core\Satuan\ListSatuan;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', Dashboard::class)->name('dashboard');
Route::get('/', Dashboard::class)->name('home');
Route::get('category',ListCategory::class)->name('category');
Route::get('satuan',ListSatuan::class)->name('satuan');
Route::get('barang',Listbarang::class)->name('barang');
