<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentDiaryLogRequest;
use App\Models\StudentDiaryLog;

class DailyReportController extends Controller
{
    public function showDailyReports($studentId){
        $studentdiarylogs = StudentDiaryLog::with('student')
            ->where('student_id', $studentId)
            ->get();

        return view('daily_reports.daily_reports', compact('studentdiarylogs', 'studentId'));
    }
    public function showDailyReportCreate($studentId){

        return view('daily_reports.daily_reports_create', compact('studentId'));
    }
    public function addDailyReport(StudentDiaryLogRequest $request, $studentId){
        $studentdiarylogs = new StudentDiaryLog();
        $studentdiarylogs->student_id = $studentId;
        $studentdiarylogs->content = $request->input('content');
        $studentdiarylogs->save();

        return redirect("/daily_reports/$studentId")->with('message', '追加しました');
    }  
    public function editDailyReport($studentdiarylogId){
        $studentdiarylog = StudentDiaryLog::find($studentdiarylogId);
        $editMode = true;

        return view('daily_reports.daily_reports_create', compact('studentdiarylog', 'editMode'));
    }

    public function updateDailyReport(StudentDiaryLogRequest $request, $studentdiarylogId){
        
        $studentdiarylog = StudentDiaryLog::find($studentdiarylogId);
        $studentdiarylog->content = $request->input('content');
        $studentdiarylog->save();
        $studentId = $studentdiarylog->student_id;

        return redirect("/daily_reports/$studentId")->with('message', '編集しました');
    }

    public function deleteDailyReport($id){
        $studentdiarylogs = StudentDiaryLog::find($id);
        $studentdiarylogs->delete();
        $studentId = $studentdiarylogs->student_id;
        
        return redirect("/daily_reports/$studentId")->with('message', '削除しました');
    }


}
