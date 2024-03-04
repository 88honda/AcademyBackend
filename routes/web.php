<?php
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\UserController;
use App\Models\Student;
use App\Http\Controllers\StudentController;

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

// Route::get('/', function () {
//     return view('index');

// });
Route::get('/sign-up', function () {
    return view('sign-up');
});



Route::get('/log', [StudentController::class, 'index']);
Route::get('/', [StudentController::class, 'index']);