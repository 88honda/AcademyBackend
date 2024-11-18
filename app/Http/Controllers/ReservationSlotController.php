<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use App\Models\TimeSlot;
use App\Models\Student;
use App\Models\Reservation;
use App\Http\Requests\ReservationRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 

class ReservationSlotController extends Controller
{
    public function showStudentReservations(Request $request){
        $timeslots =  Timeslot::with('mentor')->get();

        return view('student.reservation', compact('timeslots'));
    }

    public function edit($id){
        $timeslots = TimeSlot::findOrFail($id);
        $editMode = true;
        return view('/student/request', compact('timeslots', 'editMode'));
    }

    public function update(ReservationRequest $request, $id){
        
        $timeslot = TimeSlot::find($id);
        $timeslot->mentor_id = Auth::user()->detail_id;
        $timeslot->start_time = $request['start_time'];
        $timeslot->end_time = $request['end_time'];
        $timeslot->save();

        return redirect('/student/reservation')->with('message', '編集しました');
    }

    public function destroy($id){
        $timeslot = TimeSlot::find($id);
        $timeslot->delete();
        
        return redirect('/student/reservation')->with('message', '削除しました');
    }

    public function addRegistration(ReservationRequest $request){
        $timeslot = new Timeslot();

        $timeslot->mentor_id = Auth::user()->detail_id;
        $timeslot->start_time = $request['start_time'];
        $timeslot->end_time = $request['end_time'];
        $timeslot->status = 'available';
        $timeslot->save();

        return redirect('/student/reservation')->with('message', '追加しました');
    }  
    public function agreementReservation(Request $request, $id){
        $timeSlot = TimeSlot::find($id);
        $timeSlot->status = "booked";
        $timeSlot->save();

        return redirect('/student/reservation')->with('message', '申請を承諾しました。');
    }
    public function rejectReservation(Request $request, $id){
        $timeSlot = TimeSlot::find($id);
        $timeSlot->status = "available";
        $timeSlot->save();

        Reservation::where('time_slot_id', $id)->delete();

        return redirect('/student/reservation')->with('message', '申請を拒否しました。');
    }
    
}
