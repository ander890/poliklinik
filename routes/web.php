<?php

use App\Http\Controllers\AkunController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\ObatController;
use App\Http\Middleware\AdminAuthValidator;

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

Route::get('/admin/login', [AdminController::class, 'loginPage'])->name("login");
Route::post('/admin/login', [AdminController::class, 'login']);

Route::middleware([AdminAuthValidator::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboardPage'])->name("dashboardAdmin");

    Route::get('/admin/dokter', [DokterController::class, 'index'])->name("dokter");
    Route::post('/admin/dokter', [DokterController::class, 'store']);
    Route::get('/admin/dokter/delete/{id}', [DokterController::class, 'destroy']);
    
    Route::get('/admin/pasien', [PasienController::class, 'index'])->name("pasien");
    Route::post('/admin/pasien', [PasienController::class, 'store']);
    Route::get('/admin/pasien/delete/{id}', [PasienController::class, 'destroy']);
    
    Route::get('/admin/poli', [PoliController::class, 'index'])->name("poli");
    Route::post('/admin/poli', [PoliController::class, 'store']);
    Route::get('/admin/poli/delete/{id}', [PoliController::class, 'destroy']);
    
    Route::get('/admin/obat', [ObatController::class, 'index'])->name("obat");
    Route::post('/admin/obat', [ObatController::class, 'store']);
    Route::get('/admin/obat/delete/{id}', [ObatController::class, 'destroy']);    
});

Route::get('/pasien/login', [PasienController::class, 'loginPage']);
Route::post('/pasien/login', [PasienController::class, 'loginPasien']);


Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Auth::routes();

// Route::group(['prefix' => 'dashboard/admin'], function () {
//     Route::get('/', [HomeController::class, 'index'])->name('home');

//     Route::group(['prefix' => 'profile'], function () {
//         Route::get('/', [HomeController::class, 'profile'])->name('profile');
//         Route::post('update', [HomeController::class, 'updateprofile'])->name('profile.update');
//     });

//     Route::controller(AkunController::class)
//         ->prefix('akun')
//         ->as('akun.')
//         ->group(function () {
//             Route::get('/', 'index')->name('index');
//             Route::post('showdata', 'dataTable')->name('dataTable');
//             Route::match(['get','post'],'tambah', 'tambahAkun')->name('add');
//             Route::match(['get','post'],'{id}/ubah', 'ubahAkun')->name('edit');
//             Route::delete('{id}/hapus', 'hapusAkun')->name('delete');
//         });
// });
