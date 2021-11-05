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
    Route::post('data-dompet-add', [App\Http\Controllers\DompetController::class, 'create'])->name('add-master-dompet');
    Route::post('data-dompet-add-process', [App\Http\Controllers\DompetController::class, 'store'])->name('add-master-dompet-process');
    Route::post('data-dompet-delete', [App\Http\Controllers\DompetController::class, 's'])->name('delete-master-dompet');
});
