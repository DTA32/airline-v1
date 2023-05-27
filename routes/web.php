<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPenerbangan;
use App\Http\Controllers\AdminBandara;
use App\Http\Controllers\AdminKursiPenerbangan;
use App\Http\Controllers\AdminKelasPenerbangan;
use App\Http\Controllers\Step1Controller;
use App\Http\Controllers\Step2Controller;

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

Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'home')->name('home');
Route::view('/testcomp', 'testcomponent')->name('testcomp');
// ADMIN
Route::get('/admin/penerbangan', [AdminPenerbangan::class, 'get'])->name('admin.penerbangan');
Route::post('/admin/penerbangan', [AdminPenerbangan::class, 'add'])->name('admin.penerbangan.add');
Route::get('/admin/bandara', [AdminBandara::class, 'get'])->name('admin.bandara');
Route::post('/admin/bandara', [AdminBandara::class, 'add'])->name('admin.bandara.add');
Route::get('/admin/kursipenerbangan', [AdminKursiPenerbangan::class, 'get'])->name('admin.kursipenerbangan');
Route::post('/admin/kursipenerbangan', [AdminKursiPenerbangan::class, 'add'])->name('admin.kursipenerbangan.add');
Route::get('/admin/kelaspenerbangan', [AdminKelasPenerbangan::class, 'get'])->name('admin.kelaspenerbangan');
Route::post('/admin/kelaspenerbangan', [AdminKelasPenerbangan::class, 'add'])->name('admin.kelaspenerbangan.add');

Route::get('/step1', [Step1Controller::class, 'search'])->name('step1');
Route::get('/step2', [Step2Controller::class, 'get'])->name('step2');
