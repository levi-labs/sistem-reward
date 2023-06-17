<?php

use App\Http\Controllers\AtasanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\ProsesPenilaianController;
use App\Http\Controllers\RangeRewardController;
use App\Http\Controllers\UserController;
use App\Models\Pengajuan;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/dashboard', function () {
    $all      = Pengajuan::count();
    $approved = Pengajuan::where('status_pengajuan', 'APPROVED')->count();
    $rejected = Pengajuan::where('status_pengajuan', 'REJECTED')->count();
    
    $user = User::all();
    return view('pages.dashboard.index', ['all' => $all, 'approved' => $approved, 'rejected' => $rejected ,'user' =>$user]);
});

Route::get('/reset-password/{id}', [UserController::class, 'resetPass']);
Route::get('/delete-user/{id}', [UserController::class, 'destroy']);

Route::get('/daftar-karyawan' , [KaryawanController::class, 'index']);
Route::get('/tambah-karyawan' , [KaryawanController::class, 'create']);
Route::post('/post-karyawan' , [KaryawanController::class, 'store']);
Route::get('/edit-karyawan/{id}',[KaryawanController::class, 'edit']);
Route::post('/update-karyawan/{id}', [KaryawanController::class, 'update']);
Route::get('/delete-karyawan/{id}', [KaryawanController::class,'destroy']);

Route::get('/daftar-atasan' , [AtasanController::class, 'index']);
Route::get('/tambah-atasan' , [AtasanController::class, 'create']);
Route::post('/post-atasan' , [AtasanController::class, 'store']);
Route::get('/edit-atasan/{id}',[AtasanController::class, 'edit']);
Route::post('/update-atasan/{id}', [AtasanController::class, 'update']);
Route::get('/delete-atasan/{id}', [AtasanController::class,'destroy']);

//pengajuan

Route::get('/daftar-pengajuan', [PengajuanController::class, 'index']);
Route::get('/daftar-pengajuan-approved', [PengajuanController::class, 'indexApproved']);
Route::get('/daftar-pengajuan-rejected', [PengajuanController::class, 'indexRejected']);
Route::get('/detail-pengajuan/{id}', [PengajuanController::class, 'show']);
Route::get('/tambah-pengajuan', [PengajuanController::class, 'create']);
Route::post('/post-pengajuan', [PengajuanController::class, 'store']);
Route::get('/edit-pengajuan/{id}' , [PengajuanController::class, 'edit']);
Route::post('/update-pengajuan/{id}', [PengajuanController::class, 'update']);
Route::get('/delete-pengajuan/{id}', [PengajuanController::class, 'destroy']);
Route::get('/approve-pengajuan/{id}', [PengajuanController::class, 'approve']);
Route::get('/reject-pengajuan/{id}', [PengajuanController::class, 'reject']);


//kriteria
Route::get('/daftar-kriteria-penilaian', [KriteriaController::class, 'index']);
Route::get('/tambah-kriteria', [KriteriaController::class, 'create']);
Route::post('/post-kriteria', [KriteriaController::class,'store']);
Route::get('/edit-kriteria/{id}', [KriteriaController::class,'edit']);
Route::post('/update-kriteria/{id}', [KriteriaController::class, 'update']);
Route::get('/delete-kriteria/{id}', [KriteriaController::class, 'destroy']);

//range
Route::get('/daftar-range-total-reward',[RangeRewardController::class, 'index']);
Route::get('/tambah-range', [RangeRewardController::class, 'create']);
Route::post('/post-range', [RangeRewardController::class, 'store']);
Route::get('/edit-range/{id}', [RangeRewardController::class, 'edit']);

Route::post('/update-range/{id}', [RangeRewardController::class,'update']);
Route::get('/delete-range/{id}', [RangeRewardController::class,'destroy']);

//proses penilaian
Route::get('/daftar-proses-nilai', [ProsesPenilaianController::class, 'index']);
Route::get('/tambah-nilai' ,[ProsesPenilaianController::class, 'create']);
Route::post('/post-nilai', [ProsesPenilaianController::class, 'store']);
Route::get('/edit-nilai/{id}', [ProsesPenilaianController::class, 'edit']);
Route::post('/update-nilai/{id}', [ProsesPenilaianController::class ,'update']);
Route::get('/delete-nilai/{id}', [ProsesPenilaianController::class,'destroy']);
Route::get('print-nilai', [ProsesPenilaianController::class, 'print']);

//user 
Route::get('/daftar-users',[RangeRewardController::class, 'index']);
Route::get('/tambah-users', [RangeRewardController::class, 'create']);
Route::post('/post-users', [RangeRewardController::class, 'store']);
Route::get('/edit-users/{id]', [RangeRewardController::class, 'edit']);
Route::post('/update-users/{id}', [RangeRewardController::class,'update']);
Route::get('/delete-users/{id}', [RangeRewardController::class,'destroy']);

//Setting
Route::get('/change-password', [UserController::class, 'changePassword']);
Route::post('/update-password/{id}', [UserController::class, 'updatePassword']);

Route::get('/report-penilaian', [ProsesPenilaianController::class, 'reportNilai']);
Route::get('/report-print', [ProsesPenilaianController::class, 'printNilai']);




Auth::routes();
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/login');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
