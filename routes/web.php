<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\TransaksiKeluarController;
use App\Http\Controllers\TransaksiMasukController;
use App\Http\Controllers\TransaksiOrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('layouts.index');
// });

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'user'], function(){
        Route::resource('user', UserController::class);
        Route::resource('jabatan', RoleController::class);
    });
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/produk', ProdukController::class);
    Route::get('produk/{id}/get', [ProdukController::class, 'get'])->name('produk.get');
    Route::resource('sales', SalesController::class);
    Route::get('sales/{id}/get', [SalesController::class, 'get'])->name('sales.get');
    Route::resource('/kategori', KategoriProdukController::class);

    Route::group(['prefix' => 'transaksi'], function(){
        Route::resource('/pemesanan', TransaksiOrderController::class);
        Route::resource('/masuk', TransaksiMasukController::class);
        Route::resource('/keluar', TransaksiKeluarController::class);
    });
    
    Route::group(['prefix'=> 'rekanan'], function(){
        Route::resource('/sales', SalesController::class);
        Route::resource('/mitra', MitraController::class);
    });

    Route::group(['prefix' => 'laporan'], function(){
        Route::resource('jurnal', JurnalController::class);
    });

});

require __DIR__.'/auth.php';
