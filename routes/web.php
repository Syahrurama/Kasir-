<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardStokController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// page login //
Route::get('/', function () {
    return view('Page_login.login_awal');
});

Route::get('/login_super_admin', function () {
    return view('Page_login.login_super_admin');
})->name('login');

Route::get('/login_admin', function () {
    return view('Page_login.login_admin');
})->name('login');


Route::get('/login_petugas', function () {
    return view('Page_login.login_petugas');
})->name('login');

// page login ( Lupa password ) //
Route::get('/Page_lupa_password', function () {
    return view('page_login.page_lupa_password');
})->name('login');


// --------------------------------------------------------------------------------------------------------------------//


// page super admin//

// Route GET untuk menampilkan halaman login super admin
Route::get('/loginSuperAdmin', [AuthController::class, 'indexSuperAdmin']);

// Route POST untuk proses login super admin
Route::post('/loginSuperAdmin', [AuthController::class, 'loginSuperAdmin'])->name('loginSuperAdmin');



Route::get('page_dashboard', [DashboardController::class, 'index'])->name('page_dashboard');


Route::get('/page_anggota', function () {
    return view('Page_Super_Admin.page_anggota');
})->name('login');



Route::resource('/page_anggota',AnggotaController::class);

Route::put('/page_anggota.update/{id}', [AnggotaController::class, 'update'])->name('page_anggota.update');

Route::delete('/page_anggota.delete/{id}', [AnggotaController::class, 'destroy'])->name('page_anggota.destroy');

Route::resource ('/page_stok' ,DashboardStokController::class);




Route::get('page_keluar', function () {
    return view('Page_Super_Admin.page_keluar');
})->name('login');



// ------------------------------------------------------------------------------------------------------------------------//


//page admin
Route::post('/loginAdmin', [AuthController::class, 'loginAdmin'])->name('loginAdmin');
Route::get('/loginAdmin', [AuthController::class, 'indexAdmin']);

Route::get('dashboardadmin',[DashboardController::class,'IndexAdmin'] );

Route::get('page_stok_admin',[DashboardStokController::class,'StokAdmin'] );

Route::get('page_keluar', function () {
    return view('Page_Admin.page_keluar');
})->name('login');