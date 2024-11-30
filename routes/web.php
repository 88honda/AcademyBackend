<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DailyReportController;
use App\Http\Controllers\ReservationSlotController;
use App\Http\Controllers\ReservationRequestController;
use App\Http\Controllers\TagController;
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
    Route::get('student/request', [ReservationSlotController::class, 'createStudentReservations'])->name('student.request');
    Route::get('student/reservation', [ReservationSlotController::class, 'showStudentReservations'])->name('student.reservation');
    Route::post('student/request/add', [ReservationSlotController::class, 'addRegistration'])->name('reservation.add');
    Route::post('student/reservation/update/{id}', [ReservationSlotController::class, 'update'])->name('reservation.update');
    Route::get('student/reservation/edit/{id}', [ReservationSlotController::class, 'edit'])->name('reservation.edit');
    Route::post('student/reservation/delete/{id}', [ReservationSlotController::class, 'destroy'])->name('reservation.delete');
    Route::post('student/reservation/agreement/{id}', [ReservationSlotController::class, 'agreementReservation'])->name('reservation.agreement');
    Route::post('student/reservation/reject/{id}', [ReservationSlotController::class, 'rejectReservation'])->name('reservation.reject');
    Route::get('daily_reports/{id}', [DailyReportController::class, 'showDailyReports'])->name('daily_reports');
    Route::get('daily_reports_create/{studentId}', [DailyReportController::class, 'showDailyReportCreate'])->name('daily_reports_create');
    Route::post('daily_reports_create/add/{id}', [DailyReportController::class, 'addDailyReport'])->name('daily_reports_create.add');
    Route::get('daily_reports/daily_reports_create/edit/{id}', [DailyReportController::class, 'editDailyReport'])->name('daily_reports_create.edit');
    Route::post('daily_reports_create/update/{id}', [DailyReportController::class, 'updateDailyReport'])->name('daily_reports_create.update');
    Route::post('daily_reports/delete/{id}', [DailyReportController::class, 'deleteDailyReport'])->name('daily_reports.delete');
    Route::get('student/tag/create', [TagController::class, 'createTag'])->name('student.tag.create');
    Route::post('student/tag/store', [TagController::class, 'storeTag'])->name('student.tag.store');
    Route::get('student/tag', [TagController::class, 'showTagList'])->name('tag');
});

Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/mentor', [MentorController::class, 'showMentorList'])->name('mentor');
    Route::get('mentor/reservation/{id}', [ReservationRequestController::class, 'showMentorReservations'])->name('mentor.reservation');
    Route::post('/reservation/submit/{id}', [ReservationRequestController::class, 'submitReservation'])->name('reservation.submit');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/mentor/sign-up', [MentorController::class, 'createMentor'])->name('mentor.sign-up');
    Route::get('/student/sign-up', [StudentController::class, 'createStudent'])->name('student.sign-up');

    Route::post('/mentor/update/{id}', [MentorController::class, 'update'])->name('mentor.update');
    Route::post('/student/update/{id}', [StudentController::class, 'update'])->name('student.update');

    Route::get('/mentor/edit/{id}', [MentorController::class, 'edit'])->name('mentor.edit');
    Route::get('/student/edit/{id}', [StudentController::class, 'edit'])->name('student.edit');

    Route::post('/mentor/delete/{id}', [MentorController::class, 'destroy'])->name('mentor.delete');
    Route::post('/student/delete/{id}', [StudentController::class, 'destroy'])->name('student.delete');

    Route::post('/sign-up/add', [UserController::class, 'add'])->name('sign-in.add');
});

require __DIR__.'/auth.php';