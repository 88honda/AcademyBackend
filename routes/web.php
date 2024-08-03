<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/student', [StudentController::class, 'student'])
    ->middleware(['auth', 'verified'])->name('student');

// Route::get('dashboard', function () {

//     return view('dashboard');
    
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/sign-in', function () {
        return view('sign-in.sign-in');
    });
    Route::get('student/sign-up', function () {
        return view('student.sign-up');
    });
    Route::get('mentor/sign-up', function () {
        return view('mentor.sign-up');
    });
    // Route::get('mentor', function () {
    //     return view('mentor');
    // });
    // Route::get('student', function () {
    //     return view('student');
    // });
    Route::get('/sign-up', function () {
        return view('sign-in.sign-up');
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
    // Route::group(['middleware' => ['auth', 'role:student']], function () {
    //     Route::get('/student', [StudentController::class, 'student'])->name('student');
    // });
    // Route::group(['middleware' => ['auth', 'role:mentor']], function () {
    //     Route::get('/mentor', [MentorController::class, 'mentor'])->name('mentor');
    // });
    Route::get('/student', [StudentController::class, 'student'])->name('student');
Route::get('/mentor', [MentorController::class, 'mentor'])->name('mentor');
});


require __DIR__.'/auth.php';
