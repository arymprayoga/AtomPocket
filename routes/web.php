<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('master/')->group(function () {
    Route::get('data-dompet', [App\Http\Controllers\DompetController::class, 'index'])->name('data-dompet');
    Route::get('data-dompet-get', [App\Http\Controllers\DompetController::class, 'ajax'])->name('data-dompet-get');
    Route::get('data-dompet-add', [App\Http\Controllers\DompetController::class, 'create'])->name('add-master-dompet');
    Route::post('data-dompet-add-process', [App\Http\Controllers\DompetController::class, 'store'])->name('add-master-dompet-process');
    Route::get('data-dompet-detail/{id}', [App\Http\Controllers\DompetController::class, 'show'])->name('detail-master-dompet');
    Route::get('data-dompet-edit/{id}', [App\Http\Controllers\DompetController::class, 'edit'])->name('edit-master-dompet');
    Route::post('data-dompet-edit-process/{id}', [App\Http\Controllers\DompetController::class, 'update'])->name('edit-master-dompet-process');
    Route::get('ubah-status-dompet/{id}', [App\Http\Controllers\DompetController::class, 'ubah'])->name('ubah-status-dompet');

    Route::get('data-kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('data-kategori');
    Route::get('data-kategori-get', [App\Http\Controllers\KategoriController::class, 'ajax'])->name('data-kategori-get');
    Route::get('data-kategori-add', [App\Http\Controllers\KategoriController::class, 'create'])->name('add-master-kategori');
    Route::post('data-kategori-add-process', [App\Http\Controllers\KategoriController::class, 'store'])->name('add-master-kategori-process');
    Route::get('data-kategori-detail/{id}', [App\Http\Controllers\KategoriController::class, 'show'])->name('detail-master-kategori');
    Route::get('data-kategori-edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('edit-master-kategori');
    Route::post('data-kategori-edit-process/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('edit-master-kategori-process');
    Route::get('ubah-status-kategori/{id}', [App\Http\Controllers\KategoriController::class, 'ubah'])->name('ubah-status-kategori');
});

Route::prefix('transaksi/')->group(function () {
    Route::get('data-masuk', [App\Http\Controllers\TransaksiMasukController::class, 'index'])->name('data-masuk');
    Route::get('data-masuk-get', [App\Http\Controllers\TransaksiMasukController::class, 'ajax'])->name('data-masuk-get');
    Route::get('data-masuk-add', [App\Http\Controllers\TransaksiMasukController::class, 'create'])->name('add-master-masuk');
    Route::post('data-masuk-add-process', [App\Http\Controllers\TransaksiMasukController::class, 'store'])->name('add-master-masuk-process');
    Route::get('data-masuk-detail/{id}', [App\Http\Controllers\TransaksiMasukController::class, 'show'])->name('detail-master-masuk');
    Route::get('data-masuk-edit/{id}', [App\Http\Controllers\TransaksiMasukController::class, 'edit'])->name('edit-master-masuk');
    Route::post('data-masuk-edit-process/{id}', [App\Http\Controllers\TransaksiMasukController::class, 'update'])->name('edit-master-masuk-process');
    Route::get('ubah-status-masuk/{id}', [App\Http\Controllers\TransaksiMasukController::class, 'ubah'])->name('ubah-status-masuk');

    Route::get('data-keluar', [App\Http\Controllers\TransaksiKeluarController::class, 'index'])->name('data-keluar');
    Route::get('data-keluar-get', [App\Http\Controllers\TransaksiKeluarController::class, 'ajax'])->name('data-keluar-get');
    Route::get('data-keluar-add', [App\Http\Controllers\TransaksiKeluarController::class, 'create'])->name('add-master-keluar');
    Route::post('data-keluar-add-process', [App\Http\Controllers\TransaksiKeluarController::class, 'store'])->name('add-master-keluar-process');
    Route::get('data-keluar-detail/{id}', [App\Http\Controllers\TransaksiKeluarController::class, 'show'])->name('detail-master-keluar');
    Route::get('data-keluar-edit/{id}', [App\Http\Controllers\TransaksiKeluarController::class, 'edit'])->name('edit-master-keluar');
    Route::post('data-keluar-edit-process/{id}', [App\Http\Controllers\TransaksiKeluarController::class, 'update'])->name('edit-master-keluar-process');
    Route::get('ubah-status-keluar/{id}', [App\Http\Controllers\TransaksiKeluarController::class, 'ubah'])->name('ubah-status-keluar');
});
