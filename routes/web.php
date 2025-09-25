<?php

use App\Http\Controllers\DrugController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// MY ROUTES
Route::resource('drugs', DrugController::class);
Route::get('patients/search', [PatientController::class, 'searchPage'])->name('patients.search');
Route::post('patients/show', [PatientController::class, 'showPatient'])->name('patients.show');
Route::resource('suppliers', SupplierController::class);
Route::resource('patients', PatientController::class);
// MY ROUTES

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/transfer-Request', [TransferController::class, 'store'])->name('transfers.store');
});

require __DIR__.'/auth.php';
