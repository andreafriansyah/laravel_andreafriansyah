<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RumahSakitController;
use App\Http\Controllers\PasienController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'actionlogin'])->name('login');
Route::get('/logout', [AuthController::class, 'actionlogout'])->name('logout');


Route::get('/home', [RumahSakitController::class, 'index'])->name('home');
Route::group(['prefix' => 'rumah-sakit'], function () {
    Route::get('/', [RumahSakitController::class, 'index'])->name('home');
    Route::get('/create', [RumahSakitController::class, 'create'])->name('createRS');
    Route::post('/store', [RumahSakitController::class, 'store'])->name('storeRS');
    Route::get('/show/{id}', [RumahSakitController::class, 'show'])->name('showRS');
    Route::get('/edit/{id}', [RumahSakitController::class, 'edit'])->name('editRS');
    Route::put('/update/{id}', [RumahSakitController::class, 'update'])->name('updateRS');
    Route::delete('/delete/{id}', [RumahSakitController::class, 'destroy'])->name('deleteRs');
});

Route::group(['prefix' => 'pasien'], function () {
    Route::get('/', [PasienController::class, 'index'])->name('indexPasien');
    Route::get('/create', [PasienController::class, 'create'])->name('createPasien');
    Route::post('/store', [PasienController::class, 'store'])->name('storePasien');
    Route::get('/show/{id}', [PasienController::class, 'show'])->name('showPasien');
    Route::get('/edit/{id}', [PasienController::class, 'edit'])->name('editPasien');
    Route::put('/update/{id}', [PasienController::class, 'update'])->name('updatePasien');
    Route::delete('/delete/{id}', [PasienController::class, 'destroy'])->name('deletePasien');
});
