<?php

use App\Http\Controllers\AthleteController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PracticeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StageController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::get('/', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('athletes', [AthleteController::class, 'index'])->name('athletes.index');
Route::get('athletes/create', [AthleteController::class, 'create'])->name('athletes.create');
Route::post('athletes', [AthleteController::class, 'store'])->name('athletes.store');
Route::get('athletes/edit/{id}', [AthleteController::class, 'edit'])->name('athletes.edit');
Route::put('athletes/{id}', [AthleteController::class, 'update'])->name('athletes.update');
Route::delete('athletes/{id}', [AthleteController::class, 'delete'])->name('athletes.delete');
Route::get('athletes/test/{id}', [AthleteController::class, 'test'])->name('athletes.test');

Route::get('coaches', [CoachController::class, 'index'])->name('coaches.index');
Route::get('coaches/create', [CoachController::class, 'create'])->name('coaches.create');
Route::post('coaches', [CoachController::class, 'store'])->name('coaches.store');
Route::get('coaches/edit/{id}', [CoachController::class, 'edit'])->name('coaches.edit');
Route::put('coaches/{id}', [CoachController::class, 'update'])->name('coaches.update');
Route::delete('coaches/{id}', [CoachController::class, 'delete'])->name('coaches.delete');

Route::get('schools', [SchoolController::class, 'index'])->name('schools.index');
Route::get('schools/create', [SchoolController::class, 'create'])->name('schools.create');
Route::post('schools', [SchoolController::class, 'store'])->name('schools.store');
Route::get('schools/edit/{id}', [SchoolController::class, 'edit'])->name('schools.edit');
Route::put('schools/{id}', [SchoolController::class, 'update'])->name('schools.update');
Route::delete('schools/{id}', [SchoolController::class, 'delete'])->name('schools.delete');

Route::get('practices', [PracticeController::class, 'index'])->name('practices.index');
Route::get('practices/create', [PracticeController::class, 'create'])->name('practices.create');
Route::post('practices', [PracticeController::class, 'store'])->name('practices.store');
Route::get('practices/edit/{id}', [PracticeController::class, 'edit'])->name('practices.edit');
Route::put('practices/{id}', [PracticeController::class, 'update'])->name('practices.update');
Route::delete('practices/{id}', [PracticeController::class, 'delete'])->name('practices.delete');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::middleware('is_admin')->group(function () {
        Route::get('stages', [StageController::class, 'index'])->name('stages.index');
        Route::get('stages/create', [StageController::class, 'create'])->name('stages.create');
        Route::post('stages', [StageController::class, 'store'])->name('stages.store');
        Route::get('stages/edit/{id}', [StageController::class, 'edit'])->name('stages.edit');
        Route::put('stages/{id}', [StageController::class, 'update'])->name('stages.update');
        Route::delete('stages/{id}', [StageController::class, 'delete'])->name('stages.delete');
    });
});


require __DIR__.'/auth.php';
