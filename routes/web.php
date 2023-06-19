<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
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
Route::get('/dashboard', function () {
    return view('admin.dashboard');
});


//Doctors all pages with group------------------------------------------------------
Route::prefix('doctor')->group(function () {
    Route::view('/add','admin.doctor.add' )->name('doctor_add');
    Route::post('/insert', [DoctorController::class, 'insert'])->name('doctor_insert');
    Route::get('/list', [DoctorController::class, 'list'])->name('doctor_list');
    Route::get('/show', [DoctorController::class, 'show'])->name('doctor_show');
    Route::get('/delete', [DoctorController::class, 'delete'])->name('doctor_delete');
});