<?php
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MentorController;
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

Route::get('sign-up', function () {
    return view('sign-up');
});
Route::get('mentor', function () {
    return view('mentor');
});

Route::post('/update/{id}', [StudentController::class, 'update'])->name('update');
Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('edit');
Route::post('/delete/{id}', [StudentController::class, 'destroy'])->name('delete');
Route::post('/sign-up/add', [StudentController::class, 'add'])->name('sign-up.add');
Route::get('/mentor', [MentorController::class, 'mentor'])->name('mentor');
Route::get('/', [StudentController::class, 'index'])->name('index');