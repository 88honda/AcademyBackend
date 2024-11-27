<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentDiaryLogRequest;
use App\Models\StudentDiaryLog;

class DailyReportController extends Controller
{
    public function showDailyReports(Request $request, $id){
        $studentId = $id;

        $studentdiarylogs = StudentDiaryLog::with('student')
            ->where('student_id', $studentId)
            ->get();

        return view('daily_reports.daily_reports', compact('studentdiarylogs', 'studentId'));
    }
    public function addDailyReport(StudentDiaryLogRequest $request, $id){
        $studentdiarylogs = new StudentDiaryLog();
        $studentdiarylogs->student_id = $id;
        $studentdiarylogs->content = $request->input('content');
        $studentdiarylogs->save();

        return redirect("/daily_reports/$id")->with('message', '追加しました');
    }  
    public function editDailyReport($id){
        $studentdiarylogs = StudentDiaryLog::find($id);

        $editMode = true;
        return view('daily_reports.daily_reports_create', compact('studentdiarylogs', 'editMode', 'id'));
    }

    public function updateDailyReport(StudentDiaryLogRequest $request, $id){
        
        $studentdiarylogs = StudentDiaryLog::find($id);
        $studentdiarylogs->student_id = $studentdiarylogs->student_id;
        $studentdiarylogs->content = $request->input('content');
        $studentdiarylogs->save();
        $studentId = $studentdiarylogs->student_id;

        return redirect("/daily_reports/$studentId")->with('message', '編集しました');
    }

    public function deleteDailyReport($id){
        $studentdiarylogs = StudentDiaryLog::find($id);
        $studentdiarylogs->delete();

        $studentId = $studentdiarylogs->student_id;
        
        return redirect("/daily_reports/$studentId")->with('message', '削除しました');
    }


}
