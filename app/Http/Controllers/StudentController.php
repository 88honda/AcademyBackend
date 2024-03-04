<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    // public function showPage(){
    //     return view('index');   
    // }

    public function index(){
    // データベースからユーザー情報を取得
    $students = Student::all();
    
    // 変数の内容を確認
    Log::info($students);
    
    return view('index', ['students' => $students]);

    }
}
