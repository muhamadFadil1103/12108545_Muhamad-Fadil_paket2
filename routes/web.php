<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LaporanController;

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

Route::get('/login', [LoginController::class, 'index']);
Route::get('logout', [LoginController::class, 'logout']);
Route::post('/login-proses/', [LoginController::class, 'login_proses']);


Route::group(['middleware' => 'cekstatus'], function () {

Route::get('/', [HomeController::class, 'index']);

Route::get('beranda', [HomeController::class, 'index']);

Route::resource('pelanggan', PelangganController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('produk', ProdukController::class);

Route::get('pembelian/{id}/detail', [PembelianController::class, 'detail']);
Route::resource('pembelian', PembelianController::class);

Route::post('detailpembelian', [DetailPembelianController::class, 'store']);
Route::delete('detailpembelian/{id}', [DetailPembelianController::class, 'destroy']);

Route::get('penjualan/{id}/detail', [PenjualanController::class, 'detail']);
Route::resource('penjualan', PenjualanController::class);

Route::post('detailpenjualan', [DetailPenjualanController::class, 'store']);
Route::delete('detailpenjualan/{id}', [DetailPenjualanController::class, 'destroy']);

Route::resource('user', UserController::class);

Route::get('laporan_penjualan', [LaporanController::class, 'penjualan']);
Route::get('laporan_penjualan/excel', [LaporanController::class, 'penjualan_excel']);

Route::get('laporan_pembelian', [LaporanController::class, 'pembelian']);
Route::get('laporan_pembelian/excel', [LaporanController::class, 'pembelian_excel']);

Route::get('generate-invoice-pdf/{id}', [InvoiceController::class, 'generateInvoicePDF'])->name('generateInvoicePDF');
});
