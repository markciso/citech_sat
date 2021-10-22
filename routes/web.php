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

Route::get('/',[\App\Http\Controllers\AdmissionController::class,'index'])->name('admission');

Route::get('/registration',[\App\Http\Controllers\AdmissionController::class,'registration'])->name('registration');

Route::post('/submit-admission',[\App\Http\Controllers\AdmissionController::class,'create'])->name('admission');
// Route::get('/college_admission',[\App\Http\Controllers\AdmissionController::class,'college_admission'])->name('college_admission');
Route::get('/reference/{ref}',[\App\Http\Controllers\AdmissionController::class,'reference'])->name('reference');
Route::get('/print/{ref}',[\App\Http\Controllers\AdmissionController::class,'print_form'])->name('print_form');
Route::get('/download/{ref}',[\App\Http\Controllers\AdmissionController::class,'download_form'])->name('download_form');

Route::get('/endapp',[\App\Http\Controllers\AdmissionController::class,'endapp'])->name('endapp');
Route::any('{catchall}', [\App\Http\Controllers\AdmissionController::class,'endapp'])->where('catchall', '.*');