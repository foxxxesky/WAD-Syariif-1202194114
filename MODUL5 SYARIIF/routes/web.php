<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PatientCRUDController;
use App\Http\Controllers\VaccineCRUDController;

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

// Home
Route::get('/', [HomeController::class, 'index']);

// vaccine
Route::get('/Vaccine', [VaccineCRUDController::class, 'index']);
Route::get('/Inputvaccine', [VaccineCRUDController::class, 'inputVaccine']);
Route::post('/Inputvaccine', [VaccineCRUDController::class, 'store']);
Route::get('/updateVaccine/{id}', [VaccineCRUDController::class, 'edit'])->name('updateVaccine');
Route::post('/updateVaccine/{id}', [VaccineCRUDController::class, 'update'])->name('updateVaccine');
Route::post('/delete', [VaccineCRUDController::class, 'destroy'])->name('deleteVaccine');


// Patient
Route::get('/Patient', [PatientCRUDController::class, 'index']);
Route::get('/Selectvaccine', [PatientCRUDController::class, 'selectVaccine']);
Route::get('/Registervaccine/{id}', [PatientCRUDController::class, 'registerVaccine'])->name('selectVaccine');
Route::post('/Registervaccine/{id}', [PatientCRUDController::class, 'store'])->name('registerVaccine');
Route::get('/updatePatient/{id}', [PatientCRUDController::class, 'edit'])->name('updatePatient');
Route::post('/updatePatient/{id}', [PatientCRUDController::class, 'update'])->name('updatePatient');
Route::post('/deletepatient', [PatientCRUDController::class, 'destroy'])->name('deletePatient');