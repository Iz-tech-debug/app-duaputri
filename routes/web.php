<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\BMasukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionsController;

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

//--------------------------------------------//

// Start Auth

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::post('/login', [LoginController::class, 'cek_login'])->name('cek_login');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// End Auth

//--------------------------------------------//


// Start All Users

//  Admin
// Views
Route::get('/dashboard', function () {
    return view('admin.index');
});

// Views error
Route::get('/error', function () {
    return view('error404');
});

// Kasir
// Views
Route::get('/kasir', function () {
    return view('kasir.index');
});

// Gudang
// Views
Route::get('/gudang', function () {
    return view('kasir.index');
});

// End All Users

//--------------------------------------------//

// All Users Function

// User
// Views
Route::get('/petugas', [UsersController::class, 'index'])->name('petugas_index');

Route::post('/tambah_petugas', [UsersController::class, 'store'])->name('tambah_petugas');

Route::put('/update_petugas/{id}', [UsersController::class, 'update'])->name('update_petugas');

Route::delete('/hapus_petugas/{id}', [UsersController::class, 'destroy'])->name('hapus_petugas');


// Barang
// Views
Route::get('/barang', [BarangController::class, 'index'])->name('barang_index');

Route::post('/tambah_barang', [BarangController::class, 'store'])->name('tambah_barang');

Route::put('/update_barang/{id}', [BarangController::class, 'update'])->name('update_barang');

Route::delete('/hapus_barang/{id}', [BarangController::class, 'destroy'])->name('hapus_barang');


// Supplier
// Views
Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier_index');

Route::get('/supplierin', [BMasukController::class, 'index'])->name('barangmasuk_index');

Route::post('/tambah_supplier', [SupplierController::class, 'store'])->name('tambah_supplier');

Route::put('/update_supplier/{id}', [SupplierController::class, 'update'])->name('update_supplier');

Route::delete('/hapus_supplier/{id}', [SupplierController::class, 'destroy'])->name('hapus_supplier');


// End All Users Function


//--------------------------------------------//

// Transactions

// Views
Route::get('/transaksi', [BasketController::class, 'index'])->name('transaksi_index');

Route::post('/tambah_transaksi', [TransactionsController::class, 'store'])->name('tambah_transaksi');


// Transaksi + Detail
Route::post('/trans', [BasketController::class, 'simpanTransaksi'])->name('transaksi_simpan');


// Keranjang

Route::post('/tambah_keranjang', [BasketController::class, 'mkeranjang'])->name('tambah_keranjang');

Route::put('/edit_keranjang/{id}', [BasketController::class, 'update'])->name('edit_keranjang');

Route::delete('/hapus_keranjang/{id}', [BasketController::class, 'destroy'])->name('hapus_keranjang');

