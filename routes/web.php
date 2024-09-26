<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth', 'mentor'])->group(function () {
    Route::get('/student', [StudentController::class, 'getStudents'])->name('student');
    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservation');
    Route::get('reservation/sign-up', function () {
        return view('reservation.sign-up');
    });
    Route::post('/reservation/sign-up/add', [ReservationController::class, 'add'])->name('reservation.add');
    Route::post('/reservation/update/{id}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::get('/reservation/edit/{id}', [ReservationController::class, 'edit'])->name('reservation.edit');
    Route::post('/reservation/delete/{id}', [ReservationController::class, 'destroy'])->name('reservation.delete');
});

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/mentor', [MentorController::class, 'getMentors'])->name('mentor');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('mentor/sign-up', function () {
        return view('mentor.sign-up');
    });
    Route::get('student/sign-up', function () {
        return view('student.sign-up');
    });
    Route::post('/mentor/update/{id}', [MentorController::class, 'update'])->name('mentor.update');
    Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');

    Route::get('/mentor/edit/{id}', [MentorController::class, 'edit'])->name('mentor.edit');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

    Route::post('/mentor/delete/{id}', [MentorController::class, 'destroy'])->name('mentor.delete');
    Route::post('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

    Route::post('/mentor/sign-up/add', [MentorController::class, 'add'])->name('mentor.add');
    Route::post('/student/sign-up/add', [StudentController::class, 'add'])->name('student.add');
    Route::post('/sign-up/add', [UserController::class, 'add'])->name('sign-in.add');
});

require __DIR__.'/auth.php';