<?php

use App\Http\Controllers\AthleteController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\EditionController;
use App\Http\Controllers\HourController;
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
Route::get('coaches/{id}', [CoachController::class, 'activate'])->name('coaches.activate');
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
    Route::get('schools/coach/{id}', [SchoolController::class, 'showCoachSchools'])->name('schools.coach');
    Route::middleware('is_admin')->group(function () {
        Route::get('inactives', [CoachController::class, 'inactives'])->name('coaches.inactives');
        Route::get('stages', [StageController::class, 'index'])->name('stages.index');
        Route::get('stages/create', [StageController::class, 'create'])->name('stages.create');
        Route::post('stages', [StageController::class, 'store'])->name('stages.store');
        Route::get('stages/edit/{id}', [StageController::class, 'edit'])->name('stages.edit');
        Route::put('stages/{id}', [StageController::class, 'update'])->name('stages.update');
        Route::delete('stages/{id}', [StageController::class, 'delete'])->name('stages.delete');
        Route::get('editions', [EditionController::class, 'index'])->name('editions.index');
        Route::get('editions/create', [EditionController::class, 'create'])->name('editions.create');
        Route::post('editions', [EditionController::class, 'store'])->name('editions.store');
        Route::get('editions/edit/{id}', [EditionController::class, 'edit'])->name('editions.edit');
        Route::put('editions/{id}', [EditionController::class, 'update'])->name('editions.update');
        Route::delete('editions/{id}', [EditionController::class, 'delete'])->name('editions.delete');
        Route::get('hours', [HourController::class, 'index'])->name('hours.index');
        Route::get('hours/create', [HourController::class, 'create'])->name('hours.create');
        Route::post('hours', [HourController::class, 'store'])->name('hours.store');
        Route::get('hours/edit/{id}', [HourController::class, 'edit'])->name('hours.edit');
        Route::put('hours/{id}', [HourController::class, 'update'])->name('hours.update');
        Route::delete('hours/{id}', [HourController::class, 'delete'])->name('hours.delete');
        


    });
});


require __DIR__.'/auth.php';
