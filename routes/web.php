<?php
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\UserController;
use App\Models\Student;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SearchController;

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

Route::post('/sign-up/add', [StudentController::class, 'add'])->name('sign-up.add');
Route::get('/', [StudentController::class, 'index'])->name('index');