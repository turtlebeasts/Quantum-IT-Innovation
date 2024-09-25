<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->to('/login');
});

Route::get('/dashboard', [EmployerController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/employers', [EmployerController::class, 'index'])->name('employers.index');
    Route::get('/employers/{employer}', [EmployerController::class, 'employees'])->name('employers.employees');

    Route::post('/employers', [EmployerController::class, 'store'])->name('employers.store');
    Route::post('/employees/{employer}', [EmployerController::class, 'add_employees'])->name('employees.store');
    Route::get('/check-email', [EmployerController::class, 'checkEmail'])->name('check.email');
});

require __DIR__ . '/auth.php';
