<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\ReservationSlotController;
use App\Http\Controllers\ReservationRequestController;
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
    Route::get('/student', [StudentController::class, 'showStudentList'])->name('student');
    Route::get('student/request', function () {
        return view('/student.request');
    });
    Route::get('student/reservation', [ReservationSlotController::class, 'showStudentReservations'])->name('student.reservation');
    Route::post('student/request/add', [ReservationSlotController::class, 'addRegistration'])->name('reservation.add');
    Route::post('student/reservation/update/{id}', [ReservationSlotController::class, 'update'])->name('reservation.update');
    Route::get('student/reservation/edit/{id}', [ReservationSlotController::class, 'edit'])->name('reservation.edit');
    Route::post('student/reservation/delete/{id}', [ReservationSlotController::class, 'destroy'])->name('reservation.delete');
});

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/mentor', [MentorController::class, 'showMentorList'])->name('mentor');
    Route::get('mentor/reservation/{id}', [ReservationRequestController::class, 'showMentorReservations'])->name('mentor.reservation');
    Route::post('/reservation/submit/{id}', [ReservationRequestController::class, 'submitReservation'])->name('reservation.submit');
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

    // Route::post('/mentor/sign-up/add', [MentorController::class, 'add'])->name('mentor.add');
    // Route::post('/student/sign-up/add', [StudentController::class, 'add'])->name('student.add');
    Route::post('/sign-up/add', [UserController::class, 'add'])->name('sign-in.add');
});

require __DIR__.'/auth.php';